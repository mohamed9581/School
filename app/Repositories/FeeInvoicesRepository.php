<?php

namespace App\Repositories;
use Exception;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use App\Models\FeeInvoice;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\FeeInvoicesRepositoryInterface;


class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface{

public function index()
    {
        $fee_invoices = FeeInvoice::all();
        $grades = Grade::all();
        return view('pages.fees_invoices.index',compact('fee_invoices','grades'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('classe_id',$student->classe_id)->get();
        return view('pages.fees_invoices.add',compact('student','fees'));
    }

    public function edit($id)
    {
        $fee_invoice = FeeInvoice::findorfail($id);
        $fees = Fee::where('classe_id',$fee_invoice->classe_id)->get();
        return view('pages.fees_invoices.edit',compact('fee_invoice','fees'));
    }

    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();

        try {

            // foreach ($list_fees as $list_fee) {
            //     // حفظ البيانات في جدول فواتير الرسوم الدراسية
            //     $fee = new FeeInvoice();
            //     $fee->invoice_date = date('Y-m-d');
            //     $fee->student_id = $list_fee['student_id'];
            //     $fee->grade_id = $request->grade_id;
            //     $fee->classe_id = $request->classe_id;;
            //     $fee->fee_id = $list_fee['fee_id'];
            //     $fee->amount = $list_fee['amount'];
            //     $fee->description = $list_fee['description'];
            //     $fee->save();
   foreach ($request->student_id as $index => $listFeesInvoices) {

            $fee = new FeeInvoice();

            $fee->invoice_date = date('Y-m-d');
            $fee->student_id = $request->student_id[$index];
            $fee->grade_id = $request->grade_id;
            $fee->classe_id = $request->classe_id;;
            $fee->fee_id = $request->fee_id[$index];
            $fee->amount = $request->amount[$index];
            $fee->description = $request->description[$index];
            $fee->save();


                // حفظ البيانات في جدول حسابات الطلاب
            $studentAccount = new StudentAccount();
            $studentAccount->date = date('Y-m-d');
            $studentAccount->type = 'invoice';
            $studentAccount->fee_invoice_id = $fee->id;
            $studentAccount->student_id = $request->student_id[$index];
            $studentAccount->debit = $request->amount[$index];
            $studentAccount->credit = 0.00;
            $studentAccount->description = $request->description[$index];
            $studentAccount->save();

            }

            DB::commit();

            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('fees_invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $fee = FeeInvoice::findorfail($request->id);
            $fee->fee_id = $request->fee_id;
            $fee->amount = $request->amount;
            $fee->description = $request->description;
            $fee->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $studentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
            $studentAccount->Debit = $request->amount;
            $studentAccount->description = $request->description;
            $studentAccount->save();
            DB::commit();

            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('fees_invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            FeeInvoice::destroy($request->fee_invoice_id);
           flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

     //get all classe with ajax
    public function getAmounts($id)
    {
        return Fee::select('amount', 'id')->where("id",$id)->get();
    }

}
