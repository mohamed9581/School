<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use App\Models\Section;
// use App\Http\Requests\StoreSection;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\SectionRepositoryInterface;


class SectionRepository implements SectionRepositoryInterface{


    // get all Sections
    public function getAllSections(){
        $grades = Grade::with(['sections'])->get();
        $listegrades = Grade::all();
        $listeteachers = Teacher::all();
        return view('pages.sections.index',compact('grades','listegrades','listeteachers'));
        // return view('pages.sections.index',compact('grades','listegrades'));

    }

    // Store Sections
    public function Store($request){

            try {

            $validated = $request->validated();
            $section = new Section();
            $section->nomSection = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $section->grade_id = $request->grade_id;
            $section->classe_id = $request->classe_id;
            $section->Status = 1;
            $section->save();
            $section->teachers()->attach($request->teacher_id);

            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('sections.index');

                }

            catch (\Exception $e){
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }


    // UpdateSections
    public function UpdateSection($request,$id){

        try {

       $validated = $request->validated();
       $section = Section::findOrFail($request->id);

        $section->nomSection = ['en' => $request->name['en'], 'ar' => $request->name['ar']];
        $section->grade_id = $request->grade_id;
        $section->classe_id = $request->classe_id;
        $section->status =$request->status;
        if(isset($request->status)) {
            $section->status = 1;
        } else {
            $section->status = 2;
        }

               // update pivot Table
        if (isset($request->teacher_id)) {
            $section->teachers()->sync($request->teacher_id);
        } else {
            $section->teachers()->sync(array());
        }

      $section->save();

        flash()->addSuccess(trans('messages.Update'));

       return redirect()->route('sections.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }

    }

    // DeleteSections
    public function DeleteSection($request ,$id){

          $section = Section::findOrFail($request->id)->delete();
          flash()->addError(trans('messages.Delete'));

          return redirect()->route('sections.index');
    }

    //get all classe with ajax
    public function getClasses($id)
    {
        // $list_classes = Classe::where("grade_id", $id)->pluck("nomClasse", "id");
        // return $list_classes;
        return Classe::select('nomClasse', 'id')->where("grade_id",$id)->get();
    }

//get all classe with ajax
    public function getTeachers($id)
    {
        $data = Teacher::join('teacher_section', 'teacher_section.teacher_id', '=', 'teachers.id')
        ->join('sections', 'teacher_section.section_id', '=', 'sections.id')
        ->join('grades', 'grades.id', '=', 'sections.grade_id')
        ->select('teachers.name','teachers.id')
        ->where('grades.id','=',$id)
        ->get();
        // dd($data);
    return response()->json($data);
    }





}

