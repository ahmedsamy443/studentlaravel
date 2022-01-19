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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');


Route::group(['middleware' => ['auth:api']], function ()
   {
// student
Route::get('students','App\Http\Controllers\StudentController@index');
Route::get('students/{studentid}', 'App\Http\Controllers\StudentController@show');
Route::post('student','App\Http\Controllers\StudentController@store');
Route::put('students/{students}','App\Http\Controllers\StudentController@update');
Route::delete('students/{students}', 'App\Http\Controllers\StudentController@destroy');

//teacher
Route::get('teachers','App\Http\Controllers\TeacherController@index');
Route::get('teachers/{teacherid}', 'App\Http\Controllers\TeacherController@show');
Route::post('teacher','App\Http\Controllers\TeacherController@store');
Route::put('teachers/{teacherid}','App\Http\Controllers\TeacherController@update');
Route::delete('teachers/{teacherid}', 'App\Http\Controllers\TeacherController@destroy');

//courese
Route::get('courses','App\Http\Controllers\CourseController@index');
Route::get('courses/{courseid}', 'App\Http\Controllers\CourseController@show');
Route::post('courses','App\Http\Controllers\CourseController@store');
Route::put('courses/{courseid}','App\Http\Controllers\CourseController@update');
Route::delete('courses/{courseid}', 'App\Http\Controllers\CourseController@destroy');



});
