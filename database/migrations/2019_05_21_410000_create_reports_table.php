<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {

        	$table->increments('id');

        	$table->unsignedInteger('student_id');
        	$table->foreign('student_id')->references('id')->on('students');

        	$table->unsignedInteger('report_type_id');
        	$table->foreign('report_type_id')->references('id')->on('report_types');

        	$table->string('text', 300);

        	$table->date('date');

        	$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}