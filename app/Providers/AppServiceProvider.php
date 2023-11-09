<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    Schema::defaultStringLength(191);
    //  View::composer('*', function ($view) {
    //     $settings = Setting::pluck('value', 'key')->toArray();
    //     $view->with('settings', $settings);
    // });

    require_once app_path('helpers.php');
    view()->composer('*', function ($view) {
        $view->with('guard', Auth::guard());
    });

      $settings = Setting::pluck('value', 'key')->toArray();
        $json = json_encode($settings);
        file_put_contents(public_path('settings.json'), $json);
        $json = file_get_contents(public_path('settings.json'));
        $settings = json_decode($json, true);
        View::composer('*', function ($view) use ($settings) {
            $view->with('settings', $settings);
        });
    }
}
