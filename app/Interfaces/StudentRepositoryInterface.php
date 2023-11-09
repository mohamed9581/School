<?php

namespace App\Interfaces;


Interface StudentRepositoryInterface{

    // get all Students
    public function getAllStudents();

    // create Students
    public function create();

    // StoreStudents
    public function StoreStudents($request);


    // Edit Student
    public function EditStudent($request);

    // Show Student
    public function ShowStudent($request);

    // Update Student
    public function UpdateStudent($request,$id);

    // Delet Student
    public function DeleteStudent($request,$id);

    //get all sections with ajax
    public function getSections($id);

    //Upload_attachment
    public function Upload_attachment($request);

        //Download_attachment
    public function Download_attachment($studentsname,$filename);

    //Delete_attachment
    public function Delete_attachment($request);


    public function dashboard();
}


