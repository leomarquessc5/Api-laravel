<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('students', [App\Http\Controllers\ApiController::class, 'getAllStudents']);
Route::get('students/{id}', [App\Http\Controllers\ApiController::class, 'getStudent']);
Route::post('student/create',  [App\Http\Controllers\ApiController::class, 'createStudent']);
Route::put('students/edit/{id}', [App\Http\Controllers\ApiController::class, 'updateStudent']);
Route::delete('students/{id}/delete',[App\Http\Controllers\ApiController::class, 'deleteStudent']);