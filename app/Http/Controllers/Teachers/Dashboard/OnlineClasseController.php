<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use Exception;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;

class OnlineClasseController extends Controller
{
    use MeetingZoomTrait;
    public function index()
    {
        $online_classes = OnlineClasse::where('created_by',auth()->user()->email)->get();
        return view('pages.teachers.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $grades = Grade::where('id',auth()->user()->grade_id)->get();
        return view('pages.teachers.online_classes.create', compact('grades'));
    }

    public function indirectCreate()
    {
        $grades = Grade::where('id',auth()->user()->grade_id)->get();
        return view('pages.teachers.online_classes.indirect', compact('grades'));
    }



    public function store(Request $request)
    {
        try {

            $meeting = $this->createMeeting($request);

            OnlineClasse::create([
                'integration' => true,
                'grade_id' => $request->grades_id,
                'classe_id' => $request->classes_id,
                'section_id' => $request->sections_id,
                'created_by' => auth()->user()->email,
                // 'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('online_classesIndex');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeIndirect(Request $request)
    {
        try {
            OnlineClasse::create([
                'integration' => false,
                'grade_id' => $request->grades_id,
                'classe_id' => $request->classes_id,
                'section_id' => $request->sections_id,
                'created_by' => auth()->user()->email,
                // 'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('online_classesIndex');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function destroy(Request $request,$id)
    {
        try {

            $info = OnlineClasse::find($id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                OnlineClasse::destroy($id);
            }
            else{

                OnlineClasse::destroy($id);
            }

            flash()->addSuccess(trans('messages.Delete'));
            return redirect()->route('online_classesIndex');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
