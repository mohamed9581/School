<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Models\Grade;
use App\Models\Degree;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QuizzeController extends Controller
{
    public function index()
    {
        $quizzes = Quizze::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        // $data['grades'] = Grade::all();

        //    $data['grades'] = Grade::join('sections', 'sections.grade_id', '=','grade.id')
        // ->join('teacher_section', 'teacher_section.section_id', '=', 'sections.id')
        // ->join('teachers', 'teachers.id', '=', 'teacher_section.teacher_id')
        //  ->select('grades.*');

        $data['grades'] = Grade::join('sections', 'grades.id', '=', 'sections.grade_id')
        ->join('teacher_section', 'teacher_section.section_id', '=', 'sections.id')
        ->join('teachers', 'teachers.id', '=', 'teacher_section.teacher_id')
        ->select('grades.*')
        ->where('teachers.id', auth()->user()->id)
        ->get();
        //  dd($data['grades']);
        $ids = DB::table('teacher_subject')->where('teacher_id', auth()->user()->id)->pluck('subject_id');
        $data['subjects'] = Subject::whereIn('id', $ids)->get();
        // $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.quizzes.create', $data);
    }


    public function store(Request $request)
    {
        try {
            $quizze = new Quizze();
            $quizze->name = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $quizze->grade_id = $request->grades_id;
            $quizze->classe_id = $request->classes_id;
            $quizze->subject_id = $request->subject_id;
            $quizze->section_id = $request->sections_id;
            $quizze->teacher_id = auth()->user()->id;
            $quizze->save();

            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('quizzesCreate');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id){
        $questions = Question::where('quizze_id',$id)->get();
        $quizz = Quizze::findorFail($id);
        return view('pages.teachers.questions.index',compact('questions','quizz'));
    }


    public function edit(Request $request,$id){

        $quizze = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $ids = DB::table('teacher_subject')->where('teacher_id', auth()->user()->id)->pluck('subject_id');
        $data['subjects'] = Subject::whereIn('id', $ids)->get();
        // $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.quizzes.edit', compact('quizze','data'));

    }

    public function update(Request $request,$id)
    {
        try {
            $quizze =  Quizze::findorfail($request->id);
            $quizze->name = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $quizze->grade_id = $request->grades_id;
            $quizze->classe_id = $request->classes_id;
             $quizze->subject_id = $request->subject_id;
            $quizze->section_id = $request->sections_id;
            $quizze->teacher_id = auth()->user()->id;
            $quizze->save();

            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('quizzesCreate');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request,$id)
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

//pour recuperer les notes des examens des etudiants
    public function quizze_student($quizze_id){
        $degrees = Degree::where('quizze_id', $quizze_id)->get();
        return view('pages.teachers.quizzes.student_quizze', compact('degrees'));
    }

//pour débloque examin pour un etudiant
    public function repeat_quizze(Request $request)
    {

        Degree::where('student_id', $request->student_id)->where('quizze_id', $request->quizze_id)->delete();
        flash()->addSuccess(trans('Quizzes_trans.debloqueExam'));
        return redirect()->back();
    }

     public function getSections($id)
    {
        return Section::select('nomSection', 'id')->where("classe_id",$id)->where("teacher_id",auth()->user()->id)->get();
    }

}
