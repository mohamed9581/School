<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $quizzes = Quizze::where('grade_id', auth()->user()->grade_id)
            ->where('classe_id', auth()->user()->classe_id)
            ->where('section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('pages.students.dashboard.exams.index', compact('quizzes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($quizze_id)
    {

        $student_id = Auth::user()->id;
        return view('pages.students.dashboard.exams.show',compact('quizze_id','student_id'));
    }
}
