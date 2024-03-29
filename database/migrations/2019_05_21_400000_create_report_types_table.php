<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTypesTable extends Migration
{
    public function up()
    {
        Schema::create('report_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('report_types');
    }
}
