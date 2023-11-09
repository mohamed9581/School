<?php

namespace App\Repositories;
use Exception;
use App\Models\Student;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\ReceiptStudentsRepositoryInterface;


class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface{

     public function index()
    {
        $receipt_students = ReceiptStudent::all();
        return view('pages.receipt.index',compact('receipt_students'));

    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.receipt.add',compact('student'));
    }

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findorfail($id);
        return view('pages.receipt.edit',compact('receipt_student'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات القبض
            $receipt_student = new ReceiptStudent();
            $receipt_student->date = date('Y-m-d');
            $receipt_student->student_id = $request->student_id;
            $receipt_student->debit = $request->debit;
            $receipt_student->description = $request->description;
            $receipt_student->save();

            // حفظ البيانات في جدول الصندوق
            $fund_account = new FundAccount();
            $fund_account->date = date('Y-m-d');
            $fund_account->receipt_id = $receipt_student->id;
            $fund_account->debit = $request->debit;
            $fund_account->credit = 0.00;
            $fund_account->description = $request->description;
            $fund_account->save();

            // حفظ البيانات في جدول حساب الطالب
            $student_account = new StudentAccount();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'receipt';
            $student_account->receipt_id = $receipt_student->id;
            $student_account->student_id = $request->student_id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();

            DB::commit();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('receipt_students.index');

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول سندات القبض
            $receipt_student = ReceiptStudent::findorfail($request->id);
            $receipt_student->date = date('Y-m-d');
            $receipt_student->student_id = $request->student_id;
            $receipt_student->debit = $request->debit;
            $receipt_student->description = $request->description;
            $receipt_student->save();

            // تعديل البيانات في جدول الصندوق
            $fund_account = FundAccount::where('receipt_id',$request->id)->first();
            $fund_account->date = date('Y-m-d');
            $fund_account->receipt_id = $receipt_student->id;
            $fund_account->debit = $request->debit;
            $fund_account->credit = 0.00;
            $fund_account->description = $request->description;
            $fund_account->save();

            // تعديل البيانات في جدول الصندوق

            $student_account = StudentAccount::where('receipt_id',$request->id)->first();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'receipt';
            $student_account->student_id = $request->student_id;
            $student_account->receipt_id = $receipt_student->id;
            $student_account->debit = 0.00;
            $student_account->credit = $request->debit;
            $student_account->description = $request->description;
            $student_account->save();


            DB::commit();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('receipt_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ReceiptStudent::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
