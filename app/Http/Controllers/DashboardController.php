<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Attendance;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getstudentsnumbers()
    {
        $studentsnumbers=Student::all()->count();
         return response()->json($studentsnumbers, 200);

    }
    public function getabsentstudents()
    {
        $dt = Carbon::now();
        $absentstudents=Attendance::where("absence_status","0")->where("Attendance_date",$dt->toDateString()
        )->count();
        return response()->json($absentstudents, 200);

    }
    public function getpresencestudents()
    {
        $dt = Carbon::now();
        $studentsnumbers=Student::all()->count();
        $absentstudents=Attendance::where("absence_status","0")->where("Attendance_date",$dt->toDateString()
        )->count();
        $getpresence= $studentsnumbers- $absentstudents;
        return response()->json($getpresence, 200);

    }
}
