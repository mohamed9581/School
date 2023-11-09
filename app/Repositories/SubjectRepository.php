<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use App\Models\Subject;
// use App\Http\Requests\StoreSubject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\SubjectRepositoryInterface;


class SubjectRepository implements SubjectRepositoryInterface{


    public function index()
    {
        $subjects = Subject::get();
        return view('pages.subjects.index',compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.subjects.create',compact('grades','teachers'));
    }


    public function store($request)
    {
        try {
            $subject = new Subject();
            $subject->name = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $subject->grade_id = $request->grade_id;
            $subject->classe_id = $request->classe_id;
            // $subject->classe_id = 14;

            // $subject->teacher_id = $request->teacher_id;
            $subject->save();
            $subject->teachers()->attach($request->teacher_id);
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('subjects.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){

        $subject =Subject::findorfail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.subjects.edit',compact('subject','grades','teachers'));

    }

    public function update($request,$id)
    {
        try {
            $subject =  Subject::findorfail($request->id);
            $subject->name = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $subject->grade_id = $request->grade_id;
            $subject->classe_id = $request->classe_id;
            // $subject->teacher_id = $request->teacher_id;
               // update pivot Table
            if (isset($request->teacher_id)) {
                    $subject->teachers()->sync($request->teacher_id);
                } else {
                    $subject->teachers()->sync(array());
                }
            $subject->save();

            flash()->addSuccess(trans('messages.Update'));

            return redirect()->route('subjects.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request,$id)
    {
        try {
            Subject::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        //get all classe with ajax
    public function getClasses($id)
    {
        return Classe::select('nomClasse', 'id')->where("grade_id",$id)->get();
    }


    public function getTeachers($id)
    {
        return Teacher::select('name', 'id')->where("grade_id",$id)->get();
    }


}

