<?php

namespace App\Repositories;
use Exception;
use App\Models\Fee;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\FeeRepositoryInterface;


class FeeRepository implements FeeRepositoryInterface{


    // get all Fees
    public function getAllFees(){
        $fees = Fee::all();
        $grades = Grade::all();
        return view('pages.fees.index',compact('fees','grades'));

    }

    public function create(){
        $grades = Grade::all();
        return view('pages.fees.create',compact('grades'));
    }
    // StoreFees
    public function StoreFees($request){
           try {

            $fee = new Fee();
            $fee->title = ['en' => $request->title['en'], 'ar' => $request->title['ar']];
            $fee->amount  =$request->amount;
            $fee->grade_id  =$request->grade_id;
            $fee->classe_id  =$request->classe_id;
            $fee->description  =$request->description;
            $fee->year  =$request->academic_year;
            $fee->fee_type  =$request->fee_type;
            $fee->save();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('fees.create');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Edit fee
    public function EditFee($id){
        $fee = Fee::findorfail($id);
        $grades = Grade::all();
        return view('pages.fees.edit',compact('fee','grades'));
    }

    // UpdateFees
    public function UpdateFee($request,$id){

        try {
            $fee = Fee::findorfail($id);
            $fee->title = ['en' => $request->title['en'], 'ar' => $request->title['ar']];
            $fee->amount  =$request->amount;
            $fee->grade_id  =$request->grade_id;
            $fee->classe_id  =$request->classe_id;
            $fee->description  =$request->description;
            $fee->year  =$request->academic_year;
            $fee->fee_type  =$request->fee_type;
            $fee->save();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // DeleteFees
    public function DeleteFee($request ,$id){

        try {
            Fee::destroy($request->id);
           flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
