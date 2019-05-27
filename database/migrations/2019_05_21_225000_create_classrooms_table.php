<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('room_number')->unique();
            $table->tinyInteger('capacity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
