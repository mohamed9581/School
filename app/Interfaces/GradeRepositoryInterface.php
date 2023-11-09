<?php

namespace App\Interfaces;


Interface GradeRepositoryInterface{

    // get all Grades
    public function getAllGrades();

    // StoreGrades
    public function StoreGrades($request);


    // UpdateGrades
    public function UpdateGrades($request,$id);

    // DeleteGrades
    public function DeleteGrades($request,$id);

}


