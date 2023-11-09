<?php

namespace App\Http\Controllers\Subjects;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSubject;
use App\Http\Controllers\Controller;
use App\Interfaces\SubjectRepositoryInterface;

class SubjectController extends Controller
{
    protected $subjects;

    public function __construct(SubjectRepositoryInterface $subjects)
    {
        $this->subjects = $subjects;
    }

    public function index()
    {
        return  $this->subjects->index();
    }


    public function create()
    {
        return  $this->subjects->create();

    }


    public function store(StoreSubject $request)
    {
        return  $this->subjects->store($request);
    }


    public function edit($id)
    {
        return  $this->subjects->edit($id);
    }

    public function show($id)
    {
        //
    }


    public function update(StoreSubject $request,$id)
    {
        return  $this->subjects->update($request,$id);

    }


    public function destroy(Request $request,$id)
    {
        return  $this->subjects->destroy($request,$id);

    }


      public function getClasses($id)
    {
        return  $this->subjects->getClasses($id);
    }

      public function getTeachers($id)
    {
        return  $this->subjects->getTeachers($id);
    }

}
