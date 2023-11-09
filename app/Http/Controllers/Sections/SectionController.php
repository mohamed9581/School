<?php

namespace App\Http\Controllers\Sections;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSection;
use App\Http\Controllers\Controller;
use App\Interfaces\SectionRepositoryInterface;

class SectionController extends Controller
{
    protected $sections;

    public function __construct(SectionRepositoryInterface $sections)
    {
        $this->sections = $sections;
    }

    public function index()
    {
        return  $this->sections->getAllSections();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSection $request)
    {
        return  $this->sections->Store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSection $request, $id)
    {
        return  $this->sections->UpdateSection($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        return  $this->sections->DeleteSection($request,$id);
    }

    //get all classe with ajax
     public function allClasses($id)
    {
        return  $this->sections->getClasses($id);
    }

    //get all teachers with ajax
     public function allTeachers($id)
    {
        return  $this->sections->getTeachers($id);
    }
}
