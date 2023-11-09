<?php

namespace App\Interfaces;


Interface FeeRepositoryInterface{

    // get all Fees
    public function getAllFees();

    // create Fees
    public function create();

    // StoreFees
    public function StoreFees($request);

    // Edit Fee
    public function EditFee($id);

    // Update Fee
    public function UpdateFee($request,$id);

    // Delet Fee
    public function DeleteFee($request,$id);

}


