<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\MyParent;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        $data['type'] ='web';
        $data['students'] = Student::latest()->limit(3)->get();
        $data['teachers'] = Teacher::latest()->limit(3)->get();
        $data['parents'] = MyParent::latest()->limit(3)->get();
        $data['fees'] = FeeInvoice::latest()->limit(3)->get();

        return view('dashboard',compact('data'));
    }

}
