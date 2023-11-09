<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use App\Http\Requests\StoreClasse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\ClasseRepositoryInterface;


class ClasseRepository implements ClasseRepositoryInterface{


    // get all Classes
    public function getAllClasses(){
         $classes = Classe::all();
         $grades = Grade::all();
        return view('pages.classes.index',compact('classes','grades'));

    }

    // Store Classes
    public function Store($request){

        // dd($request->name);
    try {
            $validated = $request->validated();
             foreach ($request->name as $index => $listClasse) {
            $classe = new Classe();

            $classe->nomClasse =['en' => $request->name[$index]['en'], 'ar' => $request->name[$index]['ar']];
            $classe->grade_id = $request->grade_id[$index];
            $classe->save();
             }
           flash()->addSuccess(trans('messages.success'));
            return redirect()->route('classes.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // UpdateClasses
    public function UpdateClasses($request,$id){

        try {

       $validated = $request->validated();
       $classe = Classe::findOrFail($request->id);
       $classe->update([
        $classe->nomClasse =['en' => $request->name[0]['en'], 'ar' => $request->name[0]['ar']],
         $classe->grade_id = $request->grade_id[0],
       ]);
           flash()->addSuccess(trans('messages.Update'));

       return redirect()->route('classes.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }

    }

    // DeleteClasses
    public function DeleteClasses($request ,$id){

          $classe = Classe::findOrFail($request->id)->delete();
          flash()->addError(trans('messages.Delete'));

          return redirect()->route('classes.index');
    }

     public function delete_all($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classe::whereIn('id', $delete_all_id)->Delete();
        flash()->addError(trans('messages.Delete'));
        return redirect()->route('classes.index');
    }

}
