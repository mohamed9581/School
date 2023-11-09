<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Interfaces\GradeRepositoryInterface;
class GradeController extends Controller
{
 protected $grades;

    public function __construct(GradeRepositoryInterface $grades)
    {
        $this->grades = $grades;
    }

    public function index()
    {
        return  $this->grades->getAllGrades();
    }


    public function create()
    {
        //
    }


    public function store(StoreGrades $request)
    {
        return  $this->grades->StoreGrades($request);
    }


    public function show($id)
    {
        //
    }




    public function update(StoreGrades $request,$id)
    {
        return  $this->grades->UpdateGrades($request,$id);

    }


    public function destroy(Request $request,$id)
    {
        return  $this->grades->DeleteGrades($request,$id);

    }
}
