<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFee;
use App\Http\Controllers\Controller;
use App\Interfaces\FeeRepositoryInterface;

class FeeController extends Controller
{

    protected $fees;

    public function __construct(FeeRepositoryInterface $fees)
    {
        $this->fees = $fees;
    }

    public function index()
    {
        return $this->fees->getAllFees();
    }

    public function create()
    {
        return $this->fees->create();
    }


    public function store(StoreFee $request)
    {
        return $this->fees->StoreFees($request);
    }

    public function edit($id)
    {
        return $this->fees->EditFee($id);
    }


    public function update(StoreFee $request,$id)
    {
        return $this->fees->UpdateFee($request,$id);
    }


    public function destroy(Request $request,$id)
    {
        return $this->fees->DeleteFee($request,$id);
    }
}
