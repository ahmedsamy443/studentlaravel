<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Course extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasmany(Student::class, 'course_id');
    }
}
