<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentpayement extends Model
{
    use HasFactory;

    protected $table = 'studentpayementes';
    public $timestamps = false;

    protected $fillable = [
        'student_id',
       "class_id",
       "payement_id",
       	"student_name",
    ];

}
