<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteractionsTable extends Migration
{
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedInteger('interaction_type_id');
            $table->foreign('interaction_type_id')->references('id')->on('interaction_types');

            $table->boolean('with_parent');

            $table->string('text', 300);

            $table->date('date');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('interactions');
    }
}
