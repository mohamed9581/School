<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeeInvoice;
use App\Interfaces\FeeInvoicesRepositoryInterface;

class FeesInvoicesController extends Controller
{
    protected $fees_invoices;
    public function __construct(FeeInvoicesRepositoryInterface $fees_invoices)
    {
        $this->fees_invoices = $fees_invoices;
    }

    public function index()
    {
        return $this->fees_invoices->index();
    }



    public function store(StoreFeeInvoice $request)
    {
        return $this->fees_invoices->store($request);
    }


    public function show($id)
    {
        return $this->fees_invoices->show($id);
    }


    public function edit($id)
    {
        return $this->fees_invoices->edit($id);
    }


    public function update(StoreFeeInvoice $request)
    {
        return $this->fees_invoices->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->fees_invoices->destroy($request);
    }

    //get all fees with ajax
     public function allFees($id)
    {
        return  $this->fees_invoices->getAmounts($id);
    }
}
