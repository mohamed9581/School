<?php

namespace App\Repositories;
use Exception;
use App\Models\Student;
use App\Models\ProcessingFee;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\ProcessingFeeRepositoryInterface;


class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface{

    public function index()
    {
        $processingFees = ProcessingFee::all();
        return view('pages.processingFee.index',compact('processingFees'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.processingFee.add',compact('student'));
    }

    public function edit($id)
    {
        $processingFee = ProcessingFee::findorfail($id);
        return view('pages.processingFee.edit',compact('processingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $processingFee = new ProcessingFee();
            $processingFee->date = date('Y-m-d');
            $processingFee->student_id = $request->student_id;
            $processingFee->amount = $request->debit;
            $processingFee->description = $request->description;
            $processingFee->save();


            // حفظ البيانات في جدول حساب الطلاب
            $student_account = new StudentAccount();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'processingFee';
            $student_account->student_id = $request->student_id;
            $student_account->processing_id = $processingFee->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();


            DB::commit();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('processingFees.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول معالجة الرسوم
            $processingFee = ProcessingFee::findorfail($request->id);;
            $processingFee->date = date('Y-m-d');
            $processingFee->student_id = $request->student_id;
            $processingFee->amount = $request->debit;
            $processingFee->description = $request->description;
            $processingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $student_account = StudentAccount::where('processing_id',$request->id)->first();;
            $student_account->date = date('Y-m-d');
            $student_account->type = 'processingFee';
            $student_account->student_id = $request->student_id;
            $student_account->processing_id = $processingFee->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();


            DB::commit();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('processingFees.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ProcessingFee::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
