<?php

namespace App\Repositories;
use App\Models\Blood;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Specialisation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\StudentRepositoryInterface;


class StudentRepository implements StudentRepositoryInterface{


    // get all Students
    public function getAllStudents(){
         $students = Student::all();
        return view('pages.students.index',compact('students'));

    }

    public function create(){
       $data['classes'] = Grade::all();
       $data['parents'] = MyParent::all();
       $data['genders'] = Gender::all();
       $data['nationalites'] = Nationalitie::all();
       $data['bloods'] = Blood::all();
       return view('pages.students.create',$data);
    }


    // StoreStudents
    public function StoreStudents($request){
        // dd($request);
    DB::beginTransaction();
    try {
            $validated = $request->validated();
            $student = new Student();

            $student->name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $student->email = $request->email;
            $student->password =Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationalite_id = $request->nationalite_id;
            $student->blood_id = $request->blood_id;
            $student->Date_Birth= $request->Date_of_Birth;
            $student->grade_id = $request->grade_id;
            $student->classe_id = $request->classe_id;
            $student->section_id = $request->section_id;
            $student->parent_id = $request->parent_id;
            $student->academic_year = $request->academic_year;

            $student->save();

             if($request->hasFile("photo")){

                    $photo=$request->photo;
                    $fileName=$photo->getClientOriginalName();
                    $photo->storeAs("attachments/students/".$request->name['en']."/profile",$fileName,'upload_attachments');
                    $student->photo=$fileName;

                    $student->save();
            }
              // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$student->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $student->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
           flash()->addSuccess(trans('messages.success'));
            return redirect()->route('students.index');
        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Edit student
    public function EditStudent($id){
       $student=Student::findOrFail($id);
       $data['classes'] = Grade::all();
       $data['parents'] = MyParent::all();
       $data['genders'] = Gender::all();
       $data['nationalites'] = Nationalitie::all();
       $data['bloods'] = Blood::all();
       return view('pages.students.edit',$data,compact('student'));
    }
// Edit student
    public function ShowStudent($id){
       $student=Student::findOrFail($id);
       return view('pages.students.show',compact('student'));
    }
    // UpdateStudents
    public function UpdateStudent($request,$id){

        // dd($request);
        try {

       $validated = $request->validated();
       $student = Student::findOrFail($request->id);
       $student->update([
            $student->name =['en' => $request->name['en'], 'ar' => $request->name['ar']],
            $student->email = $request->email,
            // $student->password =Hash::make($request->password),
            $student->gender_id = $request->gender_id,
            $student->nationalite_id = $request->nationalite_id,
            $student->blood_id = $request->blood_id,
            $student->Date_Birth= $request->Date_of_Birth,
            $student->grade_id = $request->grade_id,
            $student->classe_id = $request->classe_id,
            $student->section_id = $request->section_id,
            $student->parent_id = $request->parent_id,
            $student->academic_year = $request->academic_year,
       ]);

       flash()->addSuccess(trans('messages.Update'));

       return redirect()->route('students.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }

    }

    // DeleteStudents
    public function DeleteStudent($request ,$id){
        DB::beginTransaction();
        try {
            $student = Student::findOrFail($request->id)->delete();
            $images=Image::where('imageable_id',$request->id)->where('imageable_type','App\Models\Student')->delete();
            $path = public_path('attachments/students/'.$request->studentName);

            if (File::exists($path)) {
                File::deleteDirectory($path);
            }
            DB::commit(); // delete data

          flash()->addError(trans('messages.Delete'));

          return redirect()->route('students.index');
        }
        catch (\Exception $e){
        DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

        //get all classe with ajax
    public function getSections($id)
    {
        // $list_classes = Section::where("classe_id", $id)->pluck("nomSection", "id");
        // dd($list_classes);
        // return $list_classes;
        return Section::select('nomSection', 'id')->where("classe_id",$id)->get();
    }

    public function Upload_attachment($request)
    {
         // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $request->student_id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
       flash()->addSuccess(trans('messages.success'));
        return redirect()->route('students.show',$request->student_id);
    }



     public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        Image::where('id',$request->id)->where('filename',$request->filename)->delete();
        flash()->addError(trans('messages.Delete'));
        return redirect()->route('students.show',$request->student_id);
    }


     public function dashboard(){

         $ids = Student::findorFail(auth()->user()->id)->attendances()->pluck('section_id');
        $data['count_attendances']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();
        return view('pages.students.dashboard',compact('data'));

    }

}
