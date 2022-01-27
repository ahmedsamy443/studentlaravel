<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;
use App\Models\Student;

class CourseController extends Controller
{
    public function index()
    {
        $coursesinfo=Course::all();
        return response()->json( $coursesinfo, 200);
    }

    public function getstudentclass( Request $request)
    {
       $students=Student::where("course_id",$request->id)->get();
    //    $students= Course::with(["students"])->get();
       return response()->json($students, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $course= Course::create($request->all());
        return response()->json($course, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $courseinfo= Course::find($id);
       return response()->json( $courseinfo, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseinfo= Course::find($id);
        return response()->json( $courseinfo, 200);
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
        $courseinfo= Course::find($id);
       $courseinfo->update($request->all());
        return response()->json( $courseinfo,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseinfo= Course::find($id);
        $updatedstudent= $courseinfo->delete();
        return response()->json( "deleted sucessfully", 200);
    }
}
