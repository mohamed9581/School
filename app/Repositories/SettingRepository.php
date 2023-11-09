<?php

namespace App\Repositories;
use Exception;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Request;
use App\Interfaces\SettingRepositoryInterface;


class SettingRepository implements SettingRepositoryInterface{
    use AttachFilesTrait;
     public function index()
    {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('pages.setting.index', $setting);

    }


    public function edit($id)
    {
        $setting = Setting::findorfail($id);
        return view('pages.settings.edit',compact('setting'));
    }



    public function update($request)
    {

        try{
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }

//            $key = array_keys($info);
//            $value = array_values($info);
//            for($i =0; $i<count($info);$i++){
//                Setting::where('key', $key[$i])->update(['value' => $value[$i]]);
//            }

            if($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($request,'logo','logo');
            }

            flash()->addSuccess(trans('messages.Update'));
            return back();
        }
        catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }



}
