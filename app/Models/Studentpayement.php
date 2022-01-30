<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentpayement extends Model
{
    use HasFactory;

    protected $table = 'student_payements';
    public $timestamps = false;

    protected $fillable = [
        'student_id',
       "class_id",
       "payement_id",
           "payement_date"
    ];

  public function payements()
    {
        return $this->belongsTo(Payement::class,"payement_id");
    }
}
