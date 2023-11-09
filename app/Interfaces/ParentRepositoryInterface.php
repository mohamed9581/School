<?php

namespace App\Interfaces;


Interface ParentRepositoryInterface{

    // get all Parents
    public function getAllParents();

     // afficher form parent
    public function Create();

    // StoreParents
    public function Store($request);


    // UpdateParents
    public function UpdateParent($request,$id);

    // DeleteParents
    public function DeleteParent($request,$id);

    public function firstStepSubmit();

    public function secondStepSubmit();

    public function back($step);
    public function showTable();

    //get all classe with ajax
    // public function getClasses($id);
public function dashboard();
}


