<?php

namespace App\Interfaces;


Interface PromotionRepositoryInterface{

    // get all Promotions
    public function getAllPromotions();

    // create Promotions
    public function create();

    // StorePromotions
    public function StorePromotions($request);

    // Delet Promotion
    public function DeletePromotion($request);

    //get all sections with ajax
    // public function getSections($id);


}


