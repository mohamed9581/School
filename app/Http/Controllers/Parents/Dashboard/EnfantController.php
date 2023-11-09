<?php

namespace App\Http\Controllers\Parents\Dashboard;

use App\Models\Degree;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EnfantController extends Controller
{
     // get all children
    public function index(){
        $children = Student::where('parent_id', auth()->user()->id)->get();
        return view('pages.parents.dashboard.enfants', compact('children'));
    }


     public function show($id){
        $attendances = Attendance::where('student_id',$id)->where('attendence_status',0)->get();
        return view('pages.parents.dashboard.attendence',compact('attendances'));
    }

    public function showNotification($id,$dateAbsence){
        $attendances = Attendance::where('student_id',$id)->where('attendence_status',0)->where('attendence_date',$dateAbsence)->get();
        $getID=DB::table('notifications')->where('data->enfant_id',$id)->where('data->dateAbsence',$dateAbsence)->pluck('id');
        DB::table('notifications')->where('id',$getID)->update(['read_at'=>now()]);
        return view('pages.parents.dashboard.attendence',compact('attendances'));
    }

    //pour recuperer les notes des examens des enfants
    public function quizze_enfant($student_id){
        $degrees = Degree::where('student_id', $student_id)->get();
        return view('pages.parents.dashboard.enfant_quizze', compact('degrees'));
    }


}
