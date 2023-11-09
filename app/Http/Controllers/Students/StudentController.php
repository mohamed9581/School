<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreStudent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudent;
use App\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
protected $student;

    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return  $this->student->getAllStudents();
    }


    public function create()
    {
        return  $this->student->create();
    }


    public function store(StoreStudent $request)
    {
        return  $this->student->StoreStudents($request);
    }


    public function edit( $id)
    {
        return  $this->student->EditStudent($id);
    }

    public function show($id)
    {
        return  $this->student->ShowStudent($id);
    }




    public function update(UpdateStudent $request,$id)
    {
        return  $this->student->UpdateStudent($request,$id);
    }


    public function destroy(Request $request,$id)
    {
        return  $this->student->DeleteStudent($request,$id);
    }

    //get all sections with ajax
     public function allSections($id)
    {
        return  $this->student->getSections($id);
    }

    public function Upload_attachment(Request $request)
    {
        return $this->student->Upload_attachment($request);
    }

        public function Download_attachment($studentsname,$filename)
    {
        return $this->student->Download_attachment($studentsname,$filename);
    }

    public function Delete_attachment(Request $request)
    {
        return $this->student->Delete_attachment($request);
    }



     public function dashboard()
    {
        return  $this->student->dashboard();
    }
}
