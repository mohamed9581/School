<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\GraduatedRepositoryInterface;

class GraduatedController extends Controller
{
    protected $graduated;
    public function __construct(GraduatedRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->getAllGraduateds();
    }


    public function create()
    {
        return $this->graduated->create();
    }


    public function store(Request $request)
    {
        return $this->graduated->StoreGraduateds($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id)
    {
        return $this->graduated->AnnulerDepart($request,$id);
    }


    public function destroy(Request $request)
    {
        return $this->graduated->DeleteGraduated($request);

    }
}
