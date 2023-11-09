<?php

namespace App\Interfaces;


Interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();

    // StoreTeachers
    public function StoreTeachers($request);


    // UpdateTeachers
    public function UpdateTeachers($request,$id);

    // DeleteTeachers
    public function DeleteTeachers($request,$id);


    public function dashboard();


}


