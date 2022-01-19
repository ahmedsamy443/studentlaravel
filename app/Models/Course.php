<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',


    ];

    public function students()
    {
        return $this->hasmany(student::class);
    }
}