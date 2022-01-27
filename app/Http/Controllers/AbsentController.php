<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
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
        // print_r($request->all());
        $dt = Carbon::now();
          if(Attendance::where("Attendance_date",$dt->toDateString())
          ->where("Student_id",$req->Student_id)
          ->where("class_id",$req->class_id)
          ->first())
          {

              $studentabsence=Attendance::where("Student_id",$req->student_id)->first();
              $studentabsence->update($req->all());
              return response()->json("updated successfully", 200);
            }
        $student=Attendance::create(
            [
                "Attendance_date"=>$dt->toDateString(),
                "Student_id"=>$req->Student_id,
                "class_id"=>$req->class_id,
                "absence_status"=>$req->absence_status

            ]);
            return response()->json( "regesterd successfully", 200);

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
