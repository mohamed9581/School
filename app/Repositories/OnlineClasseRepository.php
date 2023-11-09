<?php

namespace App\Repositories;
use Exception;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Support\Facades\DB;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\Request;
use App\Interfaces\OnlineClasseRepositoryInterface;


class OnlineClasseRepository implements OnlineClasseRepositoryInterface{

    use MeetingZoomTrait;
     public function index()
    {
       $online_classes = OnlineClasse::where('created_by',auth()->user()->email)->get();
        return view('pages.online_classes.index', compact('online_classes'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.online_classes.create', compact('grades'));
    }

        public function indirectCreate()
    {
        $grades = Grade::all();
        return view('pages.online_classes.indirect', compact('grades'));
    }


    public function store($request)
    {
        try {

            $meeting = $this->createMeeting($request);

            OnlineClasse::create([
                'integration' => true,
                'grade_id' => $request->grade_id,
                'classe_id' => $request->classe_id,
                'section_id' => $request->section_id,
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
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function storeIndirect( $request)
    {
         DB::beginTransaction();
        try {
            OnlineClasse::create([
                'integration' => false,
                'grade_id' => $request->grade_id,
                'classe_id' => $request->classe_id,
                'section_id' => $request->section_id,
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
             DB::commit();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update( $request)
    {
        //
    }


    public function destroy($request)
    {
        try {

            $info = OnlineClasse::find($request->id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
               OnlineClasse::where('meeting_id', $request->meeting_id)->delete();
                // OnlineClasse::destroy($request->meeting_id);
            }
            else{
               // online_classe::where('meeting_id', $request->id)->delete();
                OnlineClasse::destroy($request->id);
            }

            flash()->addSuccess(trans('messages.Delete'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}
