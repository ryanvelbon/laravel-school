<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('subject_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subject_levels');
    }
}
