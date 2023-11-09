<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SettingRepositoryInterface;

class SettingController extends Controller
{
     protected $setting;

    public function __construct(SettingRepositoryInterface $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
      return $this->setting->index();
    }


    public function edit($id)
    {
        return $this->setting->edit($id);
    }


    public function update(Request $request)
    {
        return $this->setting->update($request);
    }

//     public function setting(Request $request){
//         $settings = Setting::pluck('value', 'key')->toArray();
//         $json = json_encode($settings);
//         file_put_contents(public_path('settings.json'), $json);
//         $json = file_get_contents(public_path('settings.json'));
// $settings = json_decode($json, true);
//     }
}
