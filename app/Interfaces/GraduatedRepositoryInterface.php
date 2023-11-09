<?php

namespace App\Interfaces;


Interface GraduatedRepositoryInterface{

    // get all Graduateds
    public function getAllGraduateds();

    // create Graduateds
    public function create();

    // StoreGraduateds
    public function StoreGraduateds($request);

    // Delet Graduated
    public function DeleteGraduated($request);

    //Annuler départ
    public function AnnulerDepart($request,$id);


}


