<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Specialisation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use App\Interfaces\TeacherRepositoryInterface;


class TeacherRepository implements TeacherRepositoryInterface{


    // get all Teachers
    public function getAllTeachers(){
         $teachers = Teacher::all();
         $listeSpecialisations = Specialisation::all();
         $listeGenders = Gender::all();
         $listeGrades = Grade::all();
        return view('pages.teachers.index',compact('teachers','listeSpecialisations','listeGenders','listeGrades'));

    }

    // StoreTeachers
    public function StoreTeachers($request){
        // dd($request);
    try {
            $validated = $request->validated();
            $teacher = new Teacher();

            $teacher->name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $teacher->email = $request->email;
            $teacher->password =Hash::make($request->password);
            $teacher->specialisation_id = $request->specialisation_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->grade_id = $request->grade_id;
            $teacher->joining_Date = $request->joining_Date;
            $teacher->addresse = $request->addresse;
            $teacher->save();
           flash()->addSuccess(trans('messages.success'));
            return redirect()->route('teachers.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // UpdateTeachers
    public function UpdateTeachers($request,$id){

        // dd($request);
        try {

       $validated = $request->validated();
       $teacher = Teacher::findOrFail($request->id);
       $teacher->update([
        $teacher->name =['en' => $request->name['en'], 'ar' => $request->name['ar']],
        $teacher->email = $request->email,
        $teacher->specialisation_id = $request->specialisation_id,
        $teacher->gender_id = $request->gender_id,
        $teacher->grade_id = $request->grade_id,
        $teacher->joining_Date = $request->joining_Date,
        $teacher->addresse = $request->addresse,
       ]);

       flash()->addSuccess(trans('messages.Update'));

       return redirect()->route('teachers.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }

    }

    // DeleteTeachers
    public function DeleteTeachers($request ,$id){

          $teacher = Teacher::findOrFail($request->id)->delete();
          flash()->addError(trans('messages.Delete'));

          return redirect()->route('teachers.index');

    }



     public function dashboard(){

         $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= Student::whereIn('section_id',$ids)->count();
        return view('pages.teachers.dashboard',compact('data'));

    }

}
