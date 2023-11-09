<?php

namespace App\Repositories;
use Exception;
use App\Models\Fee;
use App\Models\Student;
use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\PaymentRepositoryInterface;


class PaymentRepository implements PaymentRepositoryInterface{

    public function index()
    {
        $payment_students = PaymentStudent::all();
        return view('pages.payments.index',compact('payment_students'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.payments.add',compact('student'));
    }

    public function edit($id)
    {
        $payment_student = PaymentStudent::findorfail($id);
        return view('pages.payments.edit',compact('payment_student'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات الصرف
            $payment_student = new PaymentStudent();
            $payment_student->date = date('Y-m-d');
            $payment_student->student_id = $request->student_id;
            $payment_student->amount = $request->debit;
            $payment_student->description = $request->description;
            $payment_student->save();


            // حفظ البيانات في جدول الصندوق
            $fund_account = new FundAccount();
            $fund_account->date = date('Y-m-d');
            $fund_account->payment_id = $payment_student->id;
            $fund_account->debit = 0.00;
            $fund_account->credit = $request->debit;
            $fund_account->description = $request->description;
            $fund_account->save();


            // حفظ البيانات في جدول حساب الطلاب
            $student_account = new StudentAccount();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'payment';
            $student_account->student_id = $request->student_id;
            $student_account->payment_id = $payment_student->id;
            $student_account->debit = $request->debit;
            $student_account->credit = 0.00;
            $student_account->description = $request->description;
            $student_account->save();

            DB::commit();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->route('payment_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {

            // تعديل البيانات في جدول سندات الصرف
            $payment_student = PaymentStudent::findorfail($request->id);
            $payment_student->date = date('Y-m-d');
            $payment_student->student_id = $request->student_id;
            $payment_student->amount = $request->debit;
            $payment_student->description = $request->description;
            $payment_student->save();


            // حفظ البيانات في جدول الصندوق
            $fund_account = FundAccount::where('payment_id',$request->id)->first();
            $fund_account->date = date('Y-m-d');
            $fund_account->payment_id = $payment_student->id;
            $fund_account->debit = 0.00;
            $fund_account->credit = $request->debit;
            $fund_account->description = $request->description;
            $fund_account->save();


            // حفظ البيانات في جدول حساب الطلاب
            $student_account = StudentAccount::where('payment_id',$request->id)->first();
            $student_account->date = date('Y-m-d');
            $student_account->type = 'payment';
            $student_account->student_id = $request->student_id;
            $student_account->payment_id = $payment_student->id;
            $student_account->debit = $request->debit;
            $student_account->credit = 0.00;
            $student_account->description = $request->description;
            $student_account->save();
            DB::commit();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('payment_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            PaymentStudent::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
