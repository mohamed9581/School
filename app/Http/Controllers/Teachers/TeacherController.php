<?php

namespace App\Http\Controllers\Teachers;
use App\Models\Gender;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Specialisation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Interfaces\TeacherRepositoryInterface;

class TeacherController extends Controller
{

protected $teachers;

    public function __construct(TeacherRepositoryInterface $teachers)
    {
        $this->teachers = $teachers;
    }

    public function index()
    {
        return  $this->teachers->getAllTeachers();
    }


    public function create()
    {
        //
    }


    public function store(StoreTeachers $request)
    {
        return  $this->teachers->StoreTeachers($request);
    }


    public function show($id)
    {
        //
    }




    public function update(StoreTeachers $request,$id)
    {
        return  $this->teachers->UpdateTeachers($request,$id);

    }


    public function destroy(Request $request,$id)
    {
        return  $this->teachers->DeleteTeachers($request,$id);
    }


     public function dashboard()
    {
        return  $this->teachers->dashboard();
    }
}
