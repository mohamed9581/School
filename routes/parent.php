<?php

use App\Models\Image;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Parents\ParentController;
use App\Http\Controllers\Parents\Dashboard\EnfantController;
use App\Http\Controllers\Students\Dashboard\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

// Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware'=>['localeSessionRedirect','localizationRedirect','localeViewPath','guest']],function(){
//     Route ::get('/', function()
//     {
//         return view ('auth.login') ;
//     }) ;
// });

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}', [LoginController::class,'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class,'login'])->name('login');
    Route::get('/logout/{type}',[LoginController::class,'logout'])->name('logout');

});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('selection');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    //==============================dashboard============================

Route::get('/parent/dashboard',[ParentController::class,'dashboard'])->name('dashboardParent');
Route::get('/parent/children',[EnfantController::class,'index'])->name('children');
Route::get('/parent/attendence/{id}',[EnfantController::class,'show'])->name('absenceStudent');
Route::get('/parent/attendence/{id}/{dateAbsence}',[EnfantController::class,'showNotification'])->name('absenceNotification');


Route::get('/parent/exam/{id}',[EnfantController::class,'quizze_enfant'])->name('examEnfant');

Route::get('/parent/profile',[ProfileController::class,'index'])->name('studentsProfile');
Route::patch('/parent/profile/{id}',[ProfileController::class,'update'])->name('profileStudents.update');




});

