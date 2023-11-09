<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PromotionRepositoryInterface;

class PromotionController extends Controller
{
    protected $promotion;
    public function __construct(PromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }

    public function index()
    {
        return $this->promotion->getAllPromotions();
    }


    public function create()
    {
        return $this->promotion->create();
    }


    public function store(Request $request)
    {
        return $this->promotion->StorePromotions($request);
    }

    public function destroy(Request $request)
    {
        return $this->promotion->DeletePromotion($request);
    }
}
