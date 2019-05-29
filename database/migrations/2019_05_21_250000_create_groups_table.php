<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('custom_id', 3)->unique();

            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('level_id');
            $table->unsignedInteger('tutor_id');
            $table->unsignedInteger('classroom_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('level_id')->references('id')->on('subject_levels');
            $table->foreign('tutor_id')->references('id')->on('tutors');
            $table->foreign('classroom_id')->references('id')->on('classrooms');

            $table->tinyInteger('weekday');
            $table->smallInteger('start_time');
            $table->smallInteger('end_time');

            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
