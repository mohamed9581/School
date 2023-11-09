<?php
namespace App\Http\Traits;

use App\Models\Setting;

trait SettingTrait {
    public function getSettings() {
        $settings = Setting::pluck('value', 'key')->toArray();
        $json = json_encode($settings);
        file_put_contents(public_path('settings.json'), $json);
        $json = file_get_contents(public_path('settings.json'));
        return json_decode($json, true);
    }
}
