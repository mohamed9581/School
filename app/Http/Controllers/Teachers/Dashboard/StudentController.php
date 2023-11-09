<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Models\Classe;
use App\Models\Section;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\AbsenceNotification;
use Illuminate\Support\Facades\Notification;
class StudentController extends Controller
{
     // get all Students
    public function index(){
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('pages.teachers.students.index', compact('students'));

    }

     // get all sections
    public function sections(){
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();
        return view('pages.teachers.students.sections', compact('sections'));

    }

     // save absences

      public function attendances(Request $request)
    {

        try {

            $attenddate = date('Y-m-d');
            $teacher_id =Auth()->user()->id;

            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
                    $attendence_status = false;
                }

               $absence = Attendance::updateorCreate(
                    [
                        'student_id' => $studentid,
                        'attendence_date' => $attenddate,
                        'teacher_id' => $teacher_id
                    ],
                    [
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classe_id' => $request->classe_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => Auth()->user()->id,
                    'attendence_date' => $attenddate,
                    'attendence_status' => $attendence_status
                ]);

                $student = Student::find($studentid);
                $parent = MyParent::find($student->parent_id);
                $getID=DB::table('notifications')->where('data->enfant_id',$studentid)->where('data->dateAbsence',$attenddate)->get();
                if( $getID->count()==0){
                    // dd($absence->attendence_status) ;
                        if(!$absence->attendence_status){
                        // $parent->notify(new AbsenceNotification($absence,$student));
                        Notification::send( $parent,new AbsenceNotification($absence,$student));
                    }
                }
            }
            flash()->addSuccess(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    //  public function editAttendance(Request $request)
    // {

    //     try {
    //         $date = date('Y-m-d');
    //         $student_id = Attendance::where('attendence_date', $date)->where('student_id', $request->id)->where('teacher_id', Auth()->user()->id)->first();
    //         if ($request->attendences == 'presence') {
    //             $attendence_status = true;
    //         } else if ($request->attendences == 'absent') {
    //             $attendence_status = false;
    //         }
    //         $student_id->update([
    //             'attendence_status' => $attendence_status
    //         ]);
    //         flash()->addSuccess(trans('messages.success'));
    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }

    // }

    public function attendanceReport()
    {

        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.students.attendance_report', compact('students'));

    }

     public function attendanceSearch(Request $request)
    {

        $request->validate([
            'fromDate' => 'required|date|date_format:Y-m-d',
            'toDate' => 'required|date|date_format:Y-m-d|after_or_equal:fromDate'
        ], [
            'toDate.after_or_equal' => trans('Attendances_trans.dateToDateFrom'),
            'fromDate.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'toDate.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);


        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        if ($request->student_id == 0) {
            $Students = Student::join('attendances', 'students.id', '=', 'attendances.student_id')
                    ->select('students.*',
                        DB::raw('COUNT(CASE WHEN attendances.attendence_status = 0 THEN 1 END) AS nb_absences'),
                        DB::raw('COUNT(CASE WHEN attendances.attendence_status = 1 THEN 1 END) AS nb_presences')
                    )
                    ->whereBetween('attendances.attendence_date', [$request->fromDate, $request->toDate])
                    ->where('attendances.teacher_id', auth()->user()->id)
                    ->groupBy('students.id')
                    ->get();
                // dd($Students);

            return view('pages.Teachers.students.attendance_report', compact('Students', 'students'));
        } else {

             $Students = Student::join('attendances', 'students.id', '=', 'attendances.student_id')
                    ->select('students.*',
                        DB::raw('COUNT(CASE WHEN attendances.attendence_status = 0 THEN 1 END) AS nb_absences'),
                        DB::raw('COUNT(CASE WHEN attendances.attendence_status = 1 THEN 1 END) AS nb_presences')
                    )
                    ->whereBetween('attendances.attendence_date', [$request->fromDate, $request->toDate])
                    ->where('attendances.teacher_id', auth()->user()->id)
                    ->where('student_id', $request->student_id)
                    ->groupBy('students.id')
                    ->get();

            // $Students = Attendance::whereBetween('attendence_date', [$request->fromDate, $request->toDate])
            //     ->where('student_id', $request->student_id)->get();
            return view('pages.Teachers.students.attendance_report', compact('Students', 'students'));


        }


    }
 public function getSections($id)
    {
        // $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');

        return Section::join('teacher_section', 'teacher_section.section_id', '=', 'sections.id')
        ->select('nomSection', 'sections.id')->where("classe_id",$id)->where("teacher_id",auth()->user()->id)->get();
    }

     //get all classe with ajax
    public function getClasses($id)
    {
        return Classe::select('nomClasse', 'id')->where("grade_id",$id)->get();
    }

}
