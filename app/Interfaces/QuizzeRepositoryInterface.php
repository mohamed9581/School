<?php

namespace App\Interfaces;


Interface QuizzeRepositoryInterface{

    // get all Quizzes
    public function index();

    // get Créer subject
    public function create();

    // StoreQuizzes
    public function store($request);


    // UpdateQuizzes
    public function update($request,$id);

    // EditerQuizzes
    public function edit($id);


    //Delete quizze
    public function destroy($request,$id);


//get all teachers with ajax
    public function getTeachers($id);

}


