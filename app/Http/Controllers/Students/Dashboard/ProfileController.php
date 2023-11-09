<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $information = Student::findorFail(auth()->user()->id);
        return view('pages.students.dashboard.profile', compact('information'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id)
    {
        $information = Student::findorFail($id);

        if (!empty($request->password)) {
             $information->name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
             $information->name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $information->save();
        }
        flash()->addSuccess(trans('messages.Update'));
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
