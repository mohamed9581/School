<?php

namespace App\Http\Controllers\Students;

use Exception;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\OnlineClasseRepositoryInterface;

class OnlineClasseController extends Controller
{

    protected $onlineClasse;

    public function __construct(OnlineClasseRepositoryInterface $onlineClasse)
    {
        $this->onlineClasse = $onlineClasse;
    }


    public function index()
    {
        return  $this->onlineClasse->index();

    }


    public function create()
    {
           return  $this->onlineClasse->create();
    }

    public function indirectCreate()
    {
        return  $this->onlineClasse->indirectCreate();
    }


    public function store(Request $request)
    {
            return  $this->onlineClasse->store($request);
    }


    public function storeIndirect(Request $request)
    {
            return  $this->onlineClasse->storeIndirect($request);

    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
            return  $this->onlineClasse->destroy();
    }
}
