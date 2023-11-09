<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Blood;
use Livewire\Component;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Nationalitie;
use Livewire\WithFileUploads;
use App\Models\ParentAttachement;
use Illuminate\Support\Facades\Hash;

class AddParent extends Component
{
    use WithFileUploads;
    public $successMessage = '';
    public $catchError;
    public $currentStep=1,
        $photos,$show_table = true,$updateMode = false,$Parent_id,
        // Father_INPUTS
        $Email, $Password,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;

    //methode qui cache table et affiche form ajout
    public function showformadd(){
        $this->show_table = false;
    }

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[A-Za-z0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[A-Za-z0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

        public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Blood::all(),
            'Religions' => Religion::all(),
            'myParents' => MyParent::all(),
        ]);
    }

     //firstStepSubmit
    public function firstStepSubmit()
    {
       $this->validate([
            'Email' => 'required|unique:my_parents,email,'.$this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my_parents,cin_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my_parents,passeport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my_parents,cin_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my_parents,passeport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){

        try {
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->Email;
            $My_Parent->password = Hash::make($this->Password);
            $My_Parent->name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->cin_Father = $this->National_ID_Father;
            $My_Parent->passeport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->phone_Father = $this->Phone_Father;
            $My_Parent->job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->nationality_Father_id = $this->Nationality_Father_id;
            $My_Parent->blood_Father_id = $this->Blood_Type_Father_id;
            $My_Parent->religion_Father_id = $this->Religion_Father_id;
            $My_Parent->addresse_Father = $this->Address_Father;

            // Mother_INPUTS
            $My_Parent->name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->cin_Mother = $this->National_ID_Mother;
            $My_Parent->passeport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->phone_Mother = $this->Phone_Mother;
            $My_Parent->job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->nationality_Mother_id = $this->Nationality_Mother_id;
            $My_Parent->blood_Mother_id = $this->Blood_Type_Mother_id;
            $My_Parent->religion_Mother_id = $this->Religion_Mother_id;
            $My_Parent->addresse_Mother = $this->Address_Mother;
            $My_Parent->save();

            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachements');
                    ParentAttachement::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => MyParent::latest()->first()->id,
                    ]);
                }
            }
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

        }

        //methode edit
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = MyParent::where('id',$id)->first();
        $this->Parent_id = $id;
        $this->Email = $My_Parent->email;
        $this->Password = $My_Parent->password;
        $this->Name_Father = $My_Parent->getTranslation('name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('job_Father', 'ar');;
        $this->Job_Father_en = $My_Parent->getTranslation('job_Father', 'en');
        $this->National_ID_Father =$My_Parent->cin_Father;
        $this->Passport_ID_Father = $My_Parent->passeport_ID_Father;
        $this->Phone_Father = $My_Parent->phone_Father;
        $this->Nationality_Father_id = $My_Parent->nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->blood_Father_id;
        $this->Address_Father =$My_Parent->addresse_Father;
        $this->Religion_Father_id =$My_Parent->religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('name_Father', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('job_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->cin_Mother;
        $this->Passport_ID_Mother = $My_Parent->passeport_ID_Mother;
        $this->Phone_Mother = $My_Parent->phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->blood_Mother_id;
        $this->Address_Mother =$My_Parent->addresse_Mother;
        $this->Religion_Mother_id =$My_Parent->religion_Mother_id;
    }

    public function submitForm_edit(){

        if ($this->Parent_id){
            $parent = MyParent::find($this->Parent_id);
            $parent->update([

            'email' => $this->Email,
            'name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
            'passeport_ID_Father' => $this->Passport_ID_Father,
            'cin_Father' => $this->National_ID_Father,
            'phone_Father' => $this->Phone_Father,
            'job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
            'nationality_Father_id' => $this->Nationality_Father_id,
            'blood_Father_id' => $this->Blood_Type_Father_id,
            'religion_Father_id' => $this->Religion_Father_id,
            'addresse_Father' => $this->Address_Father,

            // Mother_INPUTS
            'name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
            'cin_Mother' => $this->National_ID_Mother,
            'passeport_ID_Mother' => $this->Passport_ID_Mother,
            'phone_Mother' => $this->Phone_Mother,
            'job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
            'nationality_Mother_id' => $this->Nationality_Mother_id,
            'blood_Mother_id' => $this->Blood_Type_Mother_id,
            'religion_Mother_id' => $this->Religion_Mother_id,
            'addresse_Mother' => $this->Address_Mother,


            ]);

        }

        return redirect()->to('/add_parent');
    }

    public function delete($id){
        MyParent::findOrFail($id)->delete();
        return redirect()->to('/add_parent');
    }


        //clearForm
    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father ='';
        $this->Religion_Father_id ='';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother ='';
        $this->Religion_Mother_id ='';

    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

        //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

}
