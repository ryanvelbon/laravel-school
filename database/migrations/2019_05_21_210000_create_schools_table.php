<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->date('exam_date_hy');
            $table->date('exam_date_annual');
            $table->tinyInteger('school_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
