<?php

use App\Models\Image;
use Livewire\Livewire;
use App\Http\Livewire\Calendar;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Teachers\Dashboard\QuizzeController;
use App\Http\Controllers\Teachers\Dashboard\ProfileController;
use App\Http\Controllers\Teachers\Dashboard\StudentController;
use App\Http\Controllers\Teachers\Dashboard\QuestionController;
use App\Http\Controllers\Teachers\Dashboard\OnlineClasseController;


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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================

Route::get('/teacher/dashboard',[TeacherController::class,'dashboard'])->name('dashboardTeacher');
Livewire::component('calendar', Calendar::class);
Route::group(['namespace' => 'Teachers/Dashboard'], function () {

Route::get('/teacher/students',[StudentController::class,'index'])->name('students');
Route::get('/teacher/sections',[StudentController::class,'sections'])->name('sections');
Route::post('/teacher/attendances',[StudentController::class,'attendances'])->name('attendances');
Route::post('/teacher/edit_attendance',[StudentController::class,'editAttendance'])->name('attendance.edit');
Route::get('/teacher/attendance_report',[StudentController::class,'attendanceReport'])->name('attendance.report');
Route::post('/teacher/attendance_report',[StudentController::class,'attendanceSearch'])->name('attendance.search');
Route::get('/teacher/quizzes',[QuizzeController::class,'index'])->name('quizzes');
Route::post('/teacher/quizzes',[QuizzeController::class,'store'])->name('quizzesSave');
Route::get('/teacher/quizzes/edit/{id}',[QuizzeController::class,'edit'])->name('quizzesEdit');
Route::patch('/teacher/quizzes/update/{id}',[QuizzeController::class,'update'])->name('quizzesUpdate');
Route::delete('/teacher/quizzes/delete/{id}',[QuizzeController::class,'destroy'])->name('quizzesDestroy');
Route::get('/teacher/quizzes/create',[QuizzeController::class,'create'])->name('quizzesCreate');
Route::get('/teacher/questions/{id}',[QuizzeController::class,'show'])->name('questions');
Route::get('/teacher/quizze/student/{id}',[QuizzeController::class,'quizze_student'])->name('quizzeStudent');
Route::delete('/repeatQuizze/{id}',[QuizzeController::class,'repeat_quizze'])->name('repeatQuizze');
Route::get('/teacher/questions/create/{id}',[QuestionController::class,'show'])->name('questionsCreate');
Route::get('/teacher/questions/edit/{id}',[QuestionController::class,'edit'])->name('questionsEdit');
Route::patch('/teacher/questions/update/{id}',[QuestionController::class,'update'])->name('questionsUpdate');
Route::delete('/teacher/questions/delete/{id}',[QuestionController::class,'destroy'])->name('questionsDelete');
Route::post('/teacher/questions',[QuestionController::class,'store'])->name('questionStore');
Route::post('/teacher/classes/{id}',[StudentController::class,'getClasses'])->name('classes.all');
Route::post('/teacher/sections/{id}',[StudentController::class,'getSections'])->name('students.all');
Route::get('/teacher/onlineClasse',[OnlineClasseController::class,'index'])->name('online_classesIndex');
Route::get('/teacher/onlineClasse/create',[OnlineClasseController::class,'create'])->name('online_classesCreate');
Route::get('/teacher/onlineClasse/indirectCreate',[OnlineClasseController::class,'indirectCreate'])->name('online_classesIndirectCreate');
Route::post('/teacher/onlineClasse/create',[OnlineClasseController::class,'store'])->name('online_classesStore');
Route::post('/teacher/onlineClasse/storeIndirect',[OnlineClasseController::class,'storeIndirect'])->name('online_classesStoreIndirect');
Route::delete('/teacher/onlineClasse/delete/{id}',[OnlineClasseController::class,'destroy'])->name('online_classesDelete');
Route::get('/teacher/profile',[ProfileController::class,'index'])->name('profile.show');
Route::patch('/teacher/profile/{id}',[ProfileController::class,'update'])->name('profile.update');







});




});

