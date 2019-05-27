<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('full_name')->unique();

            // title (Mr., Dr., etc.) should be included in full_name field
            // dob
            // mobile
            // sex
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutors');
    }
}
