<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\GradeRepositoryInterface;


class GradeRepository implements GradeRepositoryInterface{


    // get all Grades
    public function getAllGrades(){
         $grades = Grade::all();
        return view('pages.grades.index',compact('grades'));

    }

    // StoreGrades
    public function StoreGrades($request){

    try {
            $validated = $request->validated();
            $Grade = new Grade();

            $Grade->Name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $Grade->Notes = $request->Notes;
            $Grade->save();
           flash()->addSuccess(trans('messages.success'));
            return redirect()->route('grades.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // UpdateGrades
    public function UpdateGrades($request,$id){

        try {

       $validated = $request->validated();
       $Grade = Grade::findOrFail($request->id);
       $Grade->update([
        $Grade->Name =['en' => $request->name['en'], 'ar' => $request->name['ar']],
         $Grade->Notes = $request->Notes,
       ]);
           flash()->addSuccess(trans('messages.Update'));

       return redirect()->route('grades.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }

    }

     


    // DeleteGrades
    public function DeleteGrades($request ,$id){

        $classe_id = Classe::where('grade_id',$request->id)->pluck('grade_id');

      if($classe_id->count() == 0){

          $grade = Grade::findOrFail($request->id)->delete();
          flash()->addError(trans('messages.Delete'));

          return redirect()->route('grades.index');
      }

      else{

          flash()->addError(trans('Grades_trans.delete_Grade_Error'));
          return redirect()->route('grades.index');

      }

    }

}
