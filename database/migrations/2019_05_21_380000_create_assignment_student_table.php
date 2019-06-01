<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentStudentTable extends Migration
{
    public function up()
    {
        Schema::create('assignment_student', function (Blueprint $table) {
            $table->unsignedInteger('assignment_id');
            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
                ->onDelete('cascade');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->unique(array('assignment_id', 'student_id'));

            $table->date('deadline');
            $table->boolean('submitted');
            $table->tinyInteger('mark')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignment_student');
    }
}
