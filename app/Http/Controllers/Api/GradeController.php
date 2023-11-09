<?php

namespace App\Http\Controllers\Api;

use App\Models\Grade;
use App\Models\Classe;
use App\Http\Requests\StoreGrades;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class GradeController extends Controller
{

   // get all Grades
    public function getAllGrades(){
         $grades = Grade::all();
         return response()->json($grades, 200);
    }


      // StoreGrades
    public function StoreGrades(StoreGrades $request){

    try {
            $validated = $request->validated();
            $Grade = new Grade();

            $Grade->Name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $Grade->Notes = $request->Notes;
            $Grade->save();
           flash()->addSuccess(trans('messages.success'));
            return response()->json($Grade, 200);
        }

        catch (\Exception $e){
            return response()->json( ['error' => $e->getMessage()],401);
        }
    }


    // UpdateGrades
    public function UpdateGrades(StoreGrades $request,$id){

        try {

       $validated = $request->validated();
       $Grade = Grade::findOrFail($request->id);
       $Grade->update([
        $Grade->Name =['en' => $request->name['en'], 'ar' => $request->name['ar']],
         $Grade->Notes = $request->Notes,
       ]);
           flash()->addSuccess(trans('messages.Update'));

            return response()->json($Grade, 200,['updated succesfuly']);
        }
        catch
        (\Exception $e) {

                    return response()->json( ['error' => $e->getMessage()],401);
        }

    }

    // UpdateGrades
    public function editGrades(Request $request,$id){

    $Grade = Grade::find($id);
        if(is_null($Grade)){
            return response()->json('grade introuvable', 404);

        }
    return response()->json($Grade, 200);

    }


    // DeleteGrades
    public function DeleteGrades(Request $request ,$id){

        $classe_id = Classe::where('grade_id',$id)->pluck('grade_id');

      if($classe_id->count() == 0){

          $grade = Grade::findOrFail($id)->delete();
          flash()->addError(trans('messages.Delete'));

            return response()->json($grade, 200,['deleted succesfuly']);
      }

      else{

          flash()->addError(trans('Grades_trans.delete_Grade_Error'));
            return response()->json( ['error' => $e->getMessage()],404);
      }

    }
}
