<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use App\Models\Quizze;
// use App\Http\Requests\StoreQuestion;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\QuestionRepositoryInterface;


class QuestionRepository implements QuestionRepositoryInterface{

 public function index()
    {
        $questions = Question::get();
        return view('pages.questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::get();
        return view('pages.questions.create',compact('quizzes'));
    }

     public function show($id)
    {
        $quizze = Quizze::findorfail($id);
        return view('pages.questions.create',compact('quizze'));
    }


    public function store($request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            flash()->addSuccess(trans('messages.success'));
            $quizze = Quizze::findorfail($request->quizze_id);
            return redirect()->back()->with('quizze');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quizze::get();
        return view('pages.Questions.edit',compact('question','quizzes'));
    }



    public function update($request)
    {
        try {
            $question = Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

