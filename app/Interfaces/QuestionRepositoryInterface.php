<?php

namespace App\Interfaces;


Interface QuestionRepositoryInterface{

    // get all Questions
    public function index();

    // get Créer question
    public function create();

    // StoreQuestions
    public function store($request);


    // UpdateQuestions
    public function update($request);

    // EditerQuestions
    public function edit($id);

     // Creation question
    public function show($id);

    //Delete question
    public function destroy($request);




}


