<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\ClasseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
//     return ['token' => $token->plainTextToken];
// });

Route::get('/csrf-token', function() {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::post('/login', [ClasseController::class,'login']);

// ######################route of grades###############################
Route::get('/grades', [GradeController::class,'getAllGrades'])->name('allGrades');
Route::post('/grades', [GradeController::class,'StoreGrades'])->name('StoreGrades');
Route::put('/grade/{id}', [GradeController::class,'UpdateGrades'])->name('updateGrade');
Route::get('/grade/{id}', [GradeController::class,'editGrades'])->name('getGrade');
Route::delete('/grade/{id}', [GradeController::class,'DeleteGrades'])->name('deleteGrade');

// ######################route of classe###############################
Route::get('/classes', [ClasseController::class,'getAllClasses'])->name('allClasses');
Route::post('/classes', [ClasseController::class,'Store'])->name('StoreClasses')->middleware(['auth:sanctum']);
Route::put('/classe/{id}', [ClasseController::class,'UpdateClasses'])->name('updateClasse');
Route::get('/classe/{id}', [ClasseController::class,'editClasse'])->name('getClasse');
Route::delete('/classe/{id}', [ClasseController::class,'DeleteClasses'])->name('deleteClasse');
