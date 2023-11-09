<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $information = Teacher::findorFail(auth()->user()->id);
        return view('pages.teachers.profile', compact('information'));
    }

    public function update(Request $request, $id)
    {

        $information = Teacher::findorFail($id);

        if (!empty($request->password)) {
            // $information->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
             $information->name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            // $information->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
             $information->name =['en' => $request->name['en'], 'ar' => $request->name['ar']];
            $information->save();
        }
        flash()->addSuccess(trans('messages.Update'));
        return redirect()->back();


    }
}
