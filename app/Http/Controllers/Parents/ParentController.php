<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ParentRepositoryInterface;

class ParentController extends Controller
{
    protected $parents;

    public function __construct(ParentRepositoryInterface $parents)
    {
        $this->parents = $parents;
    }

    public function index()
    {
        return  $this->parents->getAllParents();
    }

    public function create()
    {
        return  $this->parents->create();
    }


    public function store(Request $request)
    {
        return  $this->parents->Store($request);
    }




    public function edit($id)
    {
        //
    }


    public function update(StoreParent $request, $id)
    {
        return  $this->parents->UpdateParent($request,$id);
    }


    public function destroy(Request $request,$id)
    {
        return  $this->parents->DeleteParent($request,$id);
    }

     public function secondStepSubmit()
    {
        return  $this->parents->secondStepSubmit();
    }

     public function firstStepSubmit()
    {
        return  $this->parents->firstStepSubmit();
    }

    public function showTable()
    {
        return  $this->parents->showTable();
    }


     public function dashboard()
    {
        return  $this->parents->dashboard();
    }
}
