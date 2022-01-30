<?php

namespace App\Http\Controllers;
use App\Models\Studentpayement;
use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;

class Payement_ReportsController extends Controller
{
       public function getallstudents(Request $req)
       {
           $allstudents = Student::where("course_id",$req->id)->get();
            return response()->json($allstudents, 200);
       }
       public function getstudentdetails(Request $req)
       {
           $student_details=Studentpayement::where("student_id",$req->student_id)
           ->where("class_id",$req->class_id)->with("payements")->get();
                $studentname=Student::where("id",$req->student_id)->first('name');
                $class_name=Course::where("id",$req->class_id)->first("name");
                $getsum=0;
                foreach($student_details as $key=>$val)
                {
                    $getsum+=(int) $val['payements']->amount;
                }
                
                // $mathced=$student_details.filter();
                // $findvalues=[];
                // $matched=[];
                // foreach ($student_details as $val) {
                //   $matched[]=$val['payement_id'];
                // }
                // if (isset($format_data[$value[0]])) {
                //     array_push($format_data[$value[0]], $value);
                // } else {
                //     $format_data[$value[0]] = array($value);
                // }
            // }

        //   print_r($matched);
           return response()->json(["student_details"=>$student_details,"student_name"=>$studentname->name,
        "class_name"=>$class_name->name,"sum"=>$getsum], 200);

       }
}
