<?php

namespace App\Interfaces;


Interface SectionRepositoryInterface{

    // get all Sections
    public function getAllSections();

    // StoreSections
    public function Store($request);


    // UpdateSections
    public function UpdateSection($request,$id);

    // DeleteSections
    public function DeleteSection($request,$id);


    //get all classe with ajax
    public function getClasses($id);


    //get all teachers with ajax
    public function getTeachers($id);

}


