<?php

namespace App\Interfaces;


Interface SubjectRepositoryInterface{

    // get all Subjects
    public function index();

    // get Créer subject
    public function create();

    // StoreSubjects
    public function store($request);


    // UpdateSubjects
    public function update($request,$id);

    // EditerSubjects
    public function edit($id);


    //Delete subject
    public function destroy($request,$id);

    //get all classe with ajax
    public function getClasses($id);

    //get all teachers with ajax
    public function getTeachers($id);

}


