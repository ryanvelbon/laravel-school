<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentTypesTable extends Migration
{
    public function up()
    {
        Schema::create('assignment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignment_types');
    }
}
