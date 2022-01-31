<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Resources\AbsentStudents;

use Carbon\Carbon;
class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $dt = Carbon::now();
        $student_attendeance=Attendance::where("Attendance_date",$dt->toDateString())
        ->where("Student_id",$req->Student_id)
        ->where("class_id",$req->class_id)
        ->first();
          if($student_attendeance)
          {
            $student_attendeance->update(["absence_status"=>$req->absence_status]);
               return response()->json( "updated", 200);
            }
            else{
                $student=Attendance::create(
                    [
                        "Attendance_date"=>$dt->toDateString(),
                        "Student_id"=>$req->Student_id,
                        "class_id"=>$req->class_id,
                        "absence_status"=>$req->absence_status

                    ]);
                    return response()->json( "regesterd successfully", 200);

            }


    }
    public function getabsentstuents()
    {
      $absent_students= Attendance::with(["student","course"])->where("absence_status",0)->get();
       return response()->json(AbsentStudents::collection($absent_students), 200);
    }
     public function getabsentstuentsbyclass(Request $req)
     {
        $absent_students= Attendance::with(["student","course"])->where("absence_status",0)
        ->where("class_id",$req->id)
        ->get();
        return response()->json(AbsentStudents::collection($absent_students), 200);
     }
     public function getabbentstudentsbydate(Request $req)
     {
         if($req->has('class_id')&&!empty($req->input('class_id')))
         {
            $absent_students= Attendance::with(["student","course"])->where("absence_status",0)
            ->where("class_id",$req->class_id)
            ->whereBetween("Attendance_date",[$req->start_date,$req->end_date])
            ->get();
            return response()->json(AbsentStudents::collection($absent_students), 200);

         }
         $absent_students= Attendance::with(["student","course"])->where("absence_status",0)

         ->whereBetween("Attendance_date",[$req->start_date,$req->end_date])
         ->get();
         return response()->json(AbsentStudents::collection($absent_students), 200);

     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
