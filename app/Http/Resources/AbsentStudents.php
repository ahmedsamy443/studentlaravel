<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbsentStudents extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "Attendance_date"=>$this->Attendance_date,
            "student_name"=>$this->student->name,
            "class_name"=>$this->course->name,
            "Student_id"=>$this->Student_id
        ];
    }
}
