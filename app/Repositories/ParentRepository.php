<?php

namespace App\Repositories;
use App\Models\Blood;
// use App\Http\Requests\StoreParent;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Nationalitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\ParentRepositoryInterface;


class ParentRepository implements ParentRepositoryInterface{


        public $successMessage = '';

        public $catchError;
        public $currentStep=1;
        public $showTable=true;

    // get all Parents
    public function getAllParents(){

        $Nationalities= Nationalitie::all();
        $Bloods = Blood::all();
        $Religions =Religion::all();
        return view('pages.sections.index',compact('Bloods','Nationalities','Religions'));

    }

      // afficher form parent
    public function Create(){
        $Nationalities= Nationalitie::all();
        $myParents=MyParent::all();
        $Bloods = Blood::all();
        $Religions =Religion::all();
        $currentStep=2;
        $showTable=true;

        return view('pages.parents.create',compact('myParents','Bloods','Nationalities','Religions','currentStep','showTable'));
    }
    // Store Parents
    public function Store($request){
        // dd($request);

        try {
            // $validated = $request->validated();

            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $request->email;
            $My_Parent->password = Hash::make($request->password);
            $My_Parent->name_Father = ['en' => $request->Name_Father['en'], 'ar' => $request->Name_Father['ar']];

            $My_Parent->cin_Father = $request->National_ID_Father;
            $My_Parent->passeport_ID_Father = $request->Passport_ID_Father;
            $My_Parent->phone_Father = $request->Phone_Father;
            $My_Parent->job_Father = ['en' => $request->Job_Father['en'], 'ar' => $request->Job_Father['ar']];
            $My_Parent->nationality_Father_id = $request->Nationality_Father_id;
            $My_Parent->blood_Father_id = $request->Blood_Type_Father_id;
            $My_Parent->religion_Father_id = $request->Religion_Father_id;
            $My_Parent->addresse_Father = $request->Address_Father;

            // Mother_INPUTS
            $My_Parent->name_Mother = ['en' => $request->Name_Mother['en'], 'ar' => $request->Name_Mother['ar']];
            $My_Parent->cin_Mother = $request->National_ID_Mother;
            $My_Parent->passeport_ID_Mother = $request->Passport_ID_Mother;
            $My_Parent->phone_Mother = $request->Phone_Mother;
            $My_Parent->job_Mother = ['en' => $request->Job_Mother['en'], 'ar' => $request->Job_Mother['ar']];
            $My_Parent->nationality_Mother_id = $request->Nationality_Mother_id;
            $My_Parent->blood_Mother_id = $request->Blood_Type_Mother_id;
            $My_Parent->religion_Mother_id = $request->Religion_Mother_id;
            $My_Parent->addresse_Mother = $request->Address_Mother;
            // dd($My_Parent);
            $My_Parent->save();

            if (!empty($request->photos)){
                foreach ($request->photos as $photo) {
                    $photo->storeAs($request->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachments');
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => My_Parent::latest()->first()->id,
                    ]);
                }
            }
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('parents.create');

            // $this->clearForm();
        }

        catch (\Exception $e) {
            dd($e->getMessage());

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        };

    }


    // UpdateParents
    public function UpdateParent($request,$id){



    }

    // DeleteParents
    public function DeleteParent($request ,$id){


    }

      //firstStepSubmit
    public function firstStepSubmit()
    {
    //    $this->validate([
    //         'Email' => 'required|unique:my_parents,email,'.$this->id,
    //         'Password' => 'required',
    //         'Name_Father' => 'required',
    //         'Name_Father_en' => 'required',
    //         'Job_Father' => 'required',
    //         'Job_Father_en' => 'required',
    //         'National_ID_Father' => 'required|unique:my_parents,cin_Father,' . $this->id,
    //         'Passport_ID_Father' => 'required|unique:my_parents,passeport_ID_Father,' . $this->id,
    //         'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'Nationality_Father_id' => 'required',
    //         'Blood_Type_Father_id' => 'required',
    //         'Religion_Father_id' => 'required',
    //         'Address_Father' => 'required',
    //     ]);

        $currentStep = 2;

         $Nationalities= Nationalitie::all();
        $Bloods = Blood::all();
        $Religions =Religion::all();
                return view('pages.parents.create',compact('Bloods','Nationalities','Religions','currentStep'));

    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        // $this->validate([
        //     'Name_Mother' => 'required',
        //     'Name_Mother_en' => 'required',
        //     'National_ID_Mother' => 'required|unique:my_parents,cin_Mother,' . $this->id,
        //     'Passport_ID_Mother' => 'required|unique:my_parents,passeport_ID_Mother,' . $this->id,
        //     'Phone_Mother' => 'required',
        //     'Job_Mother' => 'required',
        //     'Job_Mother_en' => 'required',
        //     'Nationality_Mother_id' => 'required',
        //     'Blood_Type_Mother_id' => 'required',
        //     'Religion_Mother_id' => 'required',
        //     'Address_Mother' => 'required',
        // ]);

        $this->currentStep = 3;
    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    //show table
    public function showTable()
    {
        $Nationalities= Nationalitie::all();
        $myParents=MyParent::all();
        $Bloods = Blood::all();
        $Religions =Religion::all();
        $showTable=false;

        return view('pages.parents.create',compact('myParents','Bloods','Nationalities','Religions','currentStep','showTable'));
        }



         public function dashboard(){
        $students = Student::where('parent_id',auth()->user()->id)->get();
        $ids = MyParent::findorFail(auth()->user()->id)->children()->pluck('parent_id');
        $data['count_children']= $ids->count();
        // $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();
        $data['count_students']= 0;
        return view('pages.parents.dashboard',compact('data','students'));

    }

}
