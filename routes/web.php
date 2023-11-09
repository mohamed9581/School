<?php

use App\Models\Image;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Students\FeeController;
use App\Http\Controllers\Classes\ClasseController;
use App\Http\Controllers\Parents\ParentController;
use App\Http\Controllers\Quizzes\QuizzeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\OnlineClasseController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\ReceiptStudentsController;

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


//Auth::routes();

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

Livewire::component('calendar', Calendar::class);
Route::group(['prefix'=>LaravelLocalization::setLocale(),
    /** POUR CONSERVER LA DERNIERE LANGUE ACTIVE **/
    'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath','auth']
    ], function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    //==============================grades============================
    Route::resource('grades', GradeController::class);

    //==============================classes============================
    Route::resource('classes', ClasseController::class);
    Route::post('delete_all', [ClasseController::class,'delete_all'])->name('delete_all');

    //==============================sections============================
    Route::resource('sections', SectionController::class);
    Route::post('/classes/{id}',[SectionController::class,'allClasses'])->name('sections.all');


    //==============================parents============================
    Route::view('add_parent', 'livewire.show_Form')->name('add_parent');

    Route::resource('parents', ParentController::class);
    Route::post('/firstStepSubmit',[ParentController::class,'firstStepSubmit'])->name('parents.firstStepSubmit');
    Route::post('/showTable',[ParentController::class,'showTable'])->name('parents.showTable');

    //==============================teachers============================
    Route::resource('teachers', TeacherController::class);
    Route::post('/getTeachers/{id}',[SectionController::class,'allTeachers'])->name('teacheres.all');

    //==============================students============================
    Route::resource('students', StudentController::class);
    Route::resource('libraries', LibraryController::class);
    Route::get('download_file/{filename}',[LibraryController::class,'downloadAttachment'])->name('downloadAttachment');
    Route::resource('online_classes', OnlineClasseController::class);
    Route::get('indirect_admin',[OnlineClasseController::class,'indirectCreate'])->name('online_classes.indirectCreate');
    Route::post('indirect_admin',[OnlineClasseController::class,'storeIndirect'])->name('online_classes.storeIndirect');
    Route::post('/sections/{id}',[StudentController::class,'allSections'])->name('sectiones.all');
    Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}',[StudentController::class,'Download_attachment'])->name('Download_attachment');
    Route::delete('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');
    Route::resource('fees_invoices', FeesInvoicesController::class);
    Route::post('/fees/{id}',[FeesInvoicesController::class,'allFees']);

    Route::resource('receipt_students', ReceiptStudentsController::class);
    Route::resource('processingFees', ProcessingFeeController::class);
    Route::resource('payment_students', PaymentController::class);

    //==============================attendances============================
    Route::resource('attendances', AttendanceController::class);

    //==============================subjects============================
    Route::resource('subjects', SubjectController::class);
    // Route::post('/classes/{id}',[SubjectController::class,'getClasses'])->name('classes.all');
    Route::post('/teachers/{id}',[SubjectController::class,'getTeachers'])->name('teachers.all');


    //==============================quizzes============================
    Route::resource('quizzes', QuizzeController::class);
    Route::post('/TeacherSections/{id}',[QuizzeController::class,'getTeachers']);

  //==============================questions============================
    Route::resource('questions', QuestionController::class);


    //==============================FEES============================
    Route::resource('fees', FeeController::class);

    //==============================promotions============================
    Route::resource('promotions', PromotionController::class);

    //==============================graduateds============================
    Route::resource('graduateds', GraduatedController::class);

    //==============================settings============================
    Route::resource('settings', SettingController::class);

});



