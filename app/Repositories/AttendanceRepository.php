<?php

namespace App\Repositories;
use Exception;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\MyParent;
use App\Models\Attendance;
use App\Models\FundAccount;
use Vonage\SMS\Message\SMS;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Notifications\AbsenceNotification;
use Illuminate\Support\Facades\Notification;
use App\Interfaces\AttendanceRepositoryInterface;
use Twilio\Rest\Client;

class AttendanceRepository implements AttendanceRepositoryInterface{



     public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $listeGrades = Grade::all();
        $listeTeachers = Teacher::all();
        return view('pages.attendances.sections',compact('grades','listeGrades','listeTeachers'));

    }

    public function show($id)
    {
        $students = Student::with('attendances')->where('section_id',$id)->get();
        return view('pages.attendances.index',compact('students'));
    }

    public function edit($id)
    {
        $attendance = Attendance::findorfail($id);
        return view('pages.attendances.edit',compact('attendance'));
    }

    public function store($request)
    {
        // initiation pour envoi d'un sms
        $basic  = new \Vonage\Client\Credentials\Basic("7f4807b9", "11XolOdvevxNImri");
        $client = new \Vonage\Client($basic);
        // fin initiation


       try {

            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

            $absence = Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classe_id'=> $request->classe_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> Auth()->user()->id,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);
            $student = Student::find($studentid);
            $parent = MyParent::find($student->parent_id);
            // dd($absence->attendence_status) ;
            if(!$absence->attendence_status){
                // $parent->notify(new AbsenceNotification($absence,$student));
                Notification::send( $parent,new AbsenceNotification($absence,$student));

                // pour utilise vonage pour envoyer des sms
                $response = $client->sms()->send(
                // new \Vonage\SMS\Message\SMS("212660006805", 'Mr EL-ARCHE', 'Votre fils Bader-Eddine EL-ARCHE absent le 2023-04-28 '),

            new \Vonage\SMS\Message\SMS("212660006805", 'Mr EL-ARCHE','Nous vous informons que votre '.($student->gender->getTranslation('name', 'en')=='Female' ? 'fille ' : 'fils ') . $student->name . ' est '.($student->gender->getTranslation('name', 'en')=='Female' ? 'absente ' : 'absent ').' le '.$absence->attendence_date)
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                flash()->addSuccess('The message was sent successfully');
            } else {
                flash()->addError("The message failed with status: " . $message->getStatus());
            }
            }
            }
            // fin code pour sms
            flash()->addSuccess(trans('messages.success'));

            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول سندات القبض
            $attendance = Attendance::findorfail($request->id);
            $attendance->date = date('Y-m-d');
            $attendance->student_id = $request->student_id;
            $attendance->debit = $request->debit;
            $attendance->description = $request->description;
            $attendance->save();


            DB::commit();
            flash()->addSuccess(trans('messages.Update'));
            return redirect()->route('attendances.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Attendance::destroy($request->id);
            flash()->addError(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
