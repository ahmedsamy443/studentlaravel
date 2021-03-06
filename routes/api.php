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
Route::get('getstudentclass','App\Http\Controllers\CourseController@getstudentclass');

//absent
Route::post('absent','App\Http\Controllers\AbsentController@store');
Route::get('getabsentstuents','App\Http\Controllers\AbsentController@getabsentstuents');
Route::get('getabsentstuentsbyclass','App\Http\Controllers\AbsentController@getabsentstuentsbyclass');
Route::get('getabbentstudentsbydate','App\Http\Controllers\AbsentController@getabbentstudentsbydate');

///payment routes
Route::get('payemnts','App\Http\Controllers\PaymentController@index');
Route::get('payemnts/{payementid}', 'App\Http\Controllers\PaymentController@show');
Route::post('payemnts','App\Http\Controllers\PaymentController@store');
Route::put('payemnts/{payemntid}','App\Http\Controllers\PaymentController@update');
Route::delete('payemnts/{payemntid}', 'App\Http\Controllers\PaymentController@destroy');

//dashboard
Route::get('getstudentsnumbers','App\Http\Controllers\DashboardController@getstudentsnumbers');
Route::get('getabsentstudents','App\Http\Controllers\DashboardController@getabsentstudents');
Route::get('getpresencestudents','App\Http\Controllers\DashboardController@getpresencestudents');
// student_payemnt
Route::get('getstudents','App\Http\Controllers\StudentPayementController@getstudents');
Route::post('storepayement','App\Http\Controllers\StudentPayementController@storepayement');
Route::post('getsearchsedstudent','App\Http\Controllers\StudentPayementController@getsearchsedstudent');
Route::get('getstudentdetails','App\Http\Controllers\StudentPayementController@getstudentdetails');
//payement_reports
Route::get('getallstudents','App\Http\Controllers\Payement_ReportsController@getallstudents');
Route::get('getstudentdetails','App\Http\Controllers\Payement_ReportsController@getstudentdetails');

});
