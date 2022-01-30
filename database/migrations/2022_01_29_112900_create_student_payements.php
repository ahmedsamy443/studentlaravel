<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 use Carbon\Carbon;

class CreateStudentPayements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('student_payements', function (Blueprint $table) {
            $date = Carbon::now();

            $table->id();
            $table->string("student_id");
            $table->string("class_id");
            $table->string("payement_id");
            $table->date("payement_date")->default($date->toDateString());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_payements');
    }
}
