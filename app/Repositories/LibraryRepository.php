<?php

namespace App\Repositories;
use Exception;
use App\Models\Grade;
use App\Models\Library;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Request;
use App\Interfaces\LibraryRepositoryInterface;


class LibraryRepository implements LibraryRepositoryInterface{

     use AttachFilesTrait;
     public function index()
    {
        $books = Library::all();
        return view('pages.librarie.index',compact('books'));
    }

    public function create(){
        $grades = Grade::all();
        return view('pages.librarie.create',compact('grades'));
    }

    public function show($id)
    {
        $students = Student::with('attendances')->where('section_id',$id)->get();
        return view('pages.attendances.index',compact('students'));
    }

    public function edit($id)
    {
        $grades = Grade::all();
        $book = Library::findorFail($id);
        return view('pages.librarie.edit',compact('book','grades'));
    }

    public function store($request)
    {
        // return $request;
       try {
            $book = new Library();
            $book->title = $request->title;
            $book->file_name = $request->file('file_name')->getClientOriginalName();
            $book->grade_id = $request->grade_id;
            $book->classe_id = $request->classe_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            $this->uploadFile($request,'file_name','library');

            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('libraries.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            $book = Library::findorFail($request->id);
            $book->title = $request->title;

            if($request->hasfile('file_name')){

                $this->deleteFile($book->file_name);

                $this->uploadFile($request,'file_name','library');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->grade_id = $request->grade_id;
            $book->classe_id = $request->classe_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('libraries.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function destroy($request)
    {
        $this->deleteFile($request->file_name);
        Library::destroy($request->id);
        flash()->addError(trans('messages.Delete'));
        return redirect()->route('libraries.index');
    }

     public function download($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }

}
