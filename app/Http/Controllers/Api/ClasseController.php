<?php

namespace App\Http\Controllers\Api;

use App\Models\Grade;
use App\Models\Classe;
use App\Http\Requests\StoreClasse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class ClasseController extends Controller
{
     // get all Classes
    public function getAllClasses(){
        //  $classes = Classe::all();
         $classes = Classe::with('grades')->get();
        //  $grades = Grade::all();
    //    return response()->json([$grades,$classes], 200);
       return response()->json($classes, 200);

    }

    // Store Classes
    public function Store(StoreClasse $request){

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
       return response()->json([$classe], 200,['added successfuly']);
        }

        catch (\Exception $e){
            return response()->json( ['error' => $e->getMessage()],401);
        }
    }


    // UpdateClasses
    public function UpdateClasses(StoreClasse $request,$id){

        try {

       $validated = $request->validated();
       $classe = Classe::findOrFail($id);
       $classe->update([
        $classe->nomClasse =['en' => $request->name[0]['en'], 'ar' => $request->name[0]['ar']],
         $classe->grade_id = $request->grade_id[0],
       ]);
           flash()->addSuccess(trans('messages.Update'));

       return response()->json([$classe], 200,['updated successfuly']);
   }
   catch
   (\Exception $e) {
            return response()->json( ['error' => $e->getMessage()],401);
   }

    }

    // editClasse
    public function editClasse(Request $request,$id){

    $classe = Classe::find($id);
        if(is_null($classe)){
            return response()->json('classe introuvable', 404);

        }
    return response()->json($classe, 200);

    }

    // DeleteClasses
    public function DeleteClasses(Request $request ,$id){

          $classe = Classe::findOrFail($id)->delete();
          flash()->addError(trans('messages.Delete'));

       return response()->json([$classe], 200,['deleted successfuly']);
    }

     public function delete_all($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classe::whereIn('id', $delete_all_id)->Delete();
        flash()->addError(trans('messages.Delete'));
        return redirect()->route('classes.index');
    }

     public function login(Request $request)
    {
         // Tentative d'authentification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $accessToken = $user->createToken('MyApp')->accessToken;

            return response()->json([
                'access_token' => $accessToken,
                'user' => $user,
            ]);
        }

        // Échec de l'authentification
        throw ValidationException::withMessages([
            'email' => ['Les informations d\'identification fournies sont incorrectes.'],
        ]);
    }
}
