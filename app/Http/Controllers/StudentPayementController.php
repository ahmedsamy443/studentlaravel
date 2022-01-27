<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\Studentpayement;

use App\Http\Resources\StudentsPayements;
use Illuminate\Http\Request;
use DB;
class StudentPayementController extends Controller
{
   public function getstudents(Request $req)
   {
//   $students= Course::select('id','name')->with(["students"=>function ($query)
//   {
//       echo"1";
//       $query->select("id");
//   }])->get();
// $students=Student::where("course_id",$req->id)->with(['course'])->get();
//    $students=Course::with(["students"=>function ($q)
//    {
//        $q->select("id","name");
//    }])->where("id",$req->id)->get();
//  $students=Course::with(['students' => function ($query) {
//     $query->select('id', 'name');
// }])
// ->select('id','name')
// ->where("id",$req->id)->get();
    // $students=Course::with(['students' => function ($query) {
    //     $query->select('name', 'course_id');
    // }])->get();

    $students = Course::whereHas('students', function ( $query) {
        $query->select('id');
       })->get();
    return response()->json($students, 200);
    //  return response()->json(StudentsPayements::collection($students), 200);
   }

   public function storepayement(Request $req)
   {
    $data=Studentpayement::create($req->all());
     return response()->json($data, 200);
   }
}
