<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use App\Models\Quizze;
// use App\Http\Requests\StoreQuizze;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\QuizzeRepositoryInterface;


class QuizzeRepository implements QuizzeRepositoryInterface{


    public function index()
    {
        $quizzes = Quizze::get();
        return view('pages.quizzes.index',compact('quizzes'));
    }

    public function create()
    {
        $grades = Grade::get();
        $teachers = Teacher::get();
        $subjects = Subject::get();
        return view('pages.quizzes.create',compact('grades','teachers','subjects'));
    }


    public function store($request)
    {
        try {
            $quizze = new Quizze();
            $quizze->name = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $quizze->grade_id = $request->grade_id;
            $quizze->classe_id = $request->classe_id;
            $quizze->subject_id = $request->subject_id;
            $quizze->section_id = $request->section_id;
            $quizze->teacher_id = $request->teacher_id;
            $quizze->save();

            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('quizzes.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){

        $quizze =Quizze::findorfail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        $subjects = Subject::get();

        return view('pages.quizzes.edit',compact('quizze','grades','teachers','subjects'));

    }

    public function update($request,$id)
    {
        try {
            $quizze =  Quizze::findorfail($request->id);
            $quizze->name = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $quizze->grade_id = $request->grade_id;
            $quizze->classe_id = $request->classe_id;
            $quizze->subject_id = $request->subject_id;
            $quizze->teacher_id = $request->teacher_id;
            $quizze->save();

            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('quizzes.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request,$id)
    {
        try {
            Quizze::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

 //get all teachers with ajax
     public function getTeachers($id)
    {
        // return Teacher::select('name', 'id')->where("section_id",$id)->get();
       $teachers = Teacher::whereHas('sections', function ($query) use ($id) {
        $query->where('section_id', $id);
    })->get();

return $teachers;

    }

}

