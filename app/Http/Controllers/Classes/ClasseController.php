<?php

namespace App\Http\Controllers\Classes;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClasse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateClasse;
use App\Http\Controllers\Controller;
use App\Interfaces\ClasseRepositoryInterface;

class ClasseController extends Controller
{

    protected $classes;

    public function __construct(ClasseRepositoryInterface $classes)
    {
        $this->classes = $classes;
    }

    public function index()
    {
        return  $this->classes->getAllClasses();
    }


    public function create()
    {
        //
    }


    public function store(StoreClasse $request)
    {
    //  return $request;
    //  $count=DB::table('classes')->where('nomClasse->ar',$request->name[0]['ar'])->where('grade_id',$request->grade_id)->get();
    //  return $count;
          return  $this->classes->Store($request);
    }


    public function show($id)
    {
        //
    }




    public function update(StoreClasse $request,$id)
    {
        return  $this->classes->UpdateClasses($request,$id);

    }


    public function destroy(Request $request,$id)
    {
        return  $this->classes->DeleteClasses($request,$id);

    }

    public function delete_all(Request $request)
    {
        return  $this->classes->delete_all($request);
    }
}
