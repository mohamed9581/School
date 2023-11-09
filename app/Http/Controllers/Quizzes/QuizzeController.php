<?php

namespace App\Http\Controllers\Quizzes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\QuizzeRepositoryInterface;

class QuizzeController extends Controller
{
     protected $quizze;

    public function __construct(QuizzeRepositoryInterface $quizze)
    {
        $this->quizze =$quizze;
    }

    public function index()
    {
        return $this->quizze->index();
    }

    public function create()
    {
        return $this->quizze->create();
    }


    public function store(Request $request)
    {
        return $this->quizze->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->quizze->edit($id);
    }

    public function update(Request $request,$id)
    {
        return $this->quizze->update($request,$id);
    }

    public function destroy(Request $request,$id)
    {
        return $this->quizze->destroy($request,$id);
    }

     public function getTeachers($id)
    {
        return  $this->quizze->getTeachers($id);
    }
}
