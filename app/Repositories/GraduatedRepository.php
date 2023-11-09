<?php

namespace App\Repositories;
use Exception;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Student;
use App\Models\Graduated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use App\Interfaces\GraduatedRepositoryInterface;


class GraduatedRepository implements GraduatedRepositoryInterface{


    // get all Graduateds
    public function getAllGraduateds(){
        $students = Student::onlyTrashed()->get();
        return view('pages.students.graduateds.management',compact('students'));
    }

    public function create(){
         $grades = Grade::all();
        return view('pages.students.graduateds.create',compact('grades'));
        }

    // StoreGraduateds
    public function StoreGraduateds($request){
        $students = Student::where('grade_id',$request->grade_id)->where('classe_id',$request->classe_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated',trans('Students_trans.msgStudent'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id', $ids)->Delete();
        }    DB::commit();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('graduateds.index');
    }

    public function AnnulerDepart($request,$id){
         Student::onlyTrashed()->where('id', $request->student_id)->first()->restore();
        flash()->addSuccess(trans('messages.success'));
         return redirect()->back();
    }

    // DeleteGraduateds
    public function DeleteGraduated($request){
         DB::beginTransaction();
        try {
        Student::onlyTrashed()->where('id', $request->student_id)->first()->forceDelete();
        $images=Image::where('imageable_id',$request->student_id)->where('imageable_type','App\Models\Student')->delete();
        $path = public_path('attachments/students/'.$request->studentName);

            if (File::exists($path)) {
                File::deleteDirectory($path);
            }
            DB::commit(); // delete data
        flash()->addSuccess(trans('messages.errors'));
         return redirect()->back();
         }
        catch (Exception $e){
        DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
