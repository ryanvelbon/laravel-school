<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('custom_id', 4);
            $table->string('title', 30);
            $table->tinyInteger('type');
            $table->tinyInteger('marks_available')->unsigned();
            $table->tinyInteger('pass_mark')->unsigned();

            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('level_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('level_id')->references('id')->on('subject_levels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
