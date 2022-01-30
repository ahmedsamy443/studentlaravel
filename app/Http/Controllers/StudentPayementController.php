<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\Studentpayement;

use App\Http\Resources\StudentsPayements;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class StudentPayementController extends Controller
{
   public function getstudents(Request $req)
   {
//   $students= Course::select('id','name')->with(["students"=>function ($query)
//   {
//       echo"1";
//       $query->select("id");
//   }])->get();
$students=Student::where("course_id",$req->id)->with(['course'])->get();
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

    // $students = Course::whereHas('students', function ( $query) {
    //     $query->select('id');
    //    })->get();
    // return response()->json($students, 200);
      return response()->json(StudentsPayements::collection($students), 200);
   }

   public function storepayement(Request $req)
   {
    $date = Carbon::now();
  $checkpayemt= Studentpayement::where("student_id",$req->student_id)->where("class_id",$req->class_id)->
   where("payement_id",$req->payement_id)->where("payement_date",$date->toDateString())->count()>0;

if($checkpayemt)
{
    return response()->json("this transction has been payed before", 400);


}
 $data=Studentpayement::create($req->all());
     return response()->json($data, 200);
   }

   public function getsearchsedstudent(Request $req)
   {
   $students= Student::where ( 'name', 'LIKE', '%' .$req->name . '%' )->get();
   return response()->json($students, 200);

   }
   public function getstudentdetails(Request $req)
   {
          $student_details=student::where("id",$req->id)->with(['course'])->get();
          return response()->json(StudentsPayements::collection($student_details), 200);

   }

}
