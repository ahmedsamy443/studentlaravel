<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'Attendance_date',
        'Student_id',
        'class_id',
        "absence_status"
    ];
}
