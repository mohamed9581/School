<?php

use App\Models\Image;
use Livewire\Livewire;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CalendarStudent;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Students\Dashboard\ExamController;
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
Livewire::component('calendar-student', CalendarStudent::class);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================

Route::get('/student/dashboard',[StudentController::class,'dashboard'])->name('dashboardStudent');
Route::get('/student/exam',[ExamController::class,'index'])->name('studentExam');
Route::get('/student/exam/question/{id}',[ExamController::class,'show'])->name('examQuestion');
Route::get('/student/profile',[ProfileController::class,'index'])->name('studentProfile');
Route::patch('/student/profile/{id}',[ProfileController::class,'update'])->name('profileStudent.update');






});

