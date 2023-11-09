<?php

namespace App\Interfaces;


Interface ClasseRepositoryInterface{

    // get all Classes
    public function getAllClasses();

    // StoreClasses
    public function Store($request);


    // UpdateClasses
    public function UpdateClasses($request,$id);

    // DeleteClasses
    public function DeleteClasses($request,$id);

    public function delete_all($request);

}


