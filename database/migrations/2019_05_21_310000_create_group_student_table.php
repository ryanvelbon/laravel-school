<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupStudentTable extends Migration
{
    public function up()
    {
        Schema::create('group_student', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')
                  ->references('id')
                  ->on('groups')
                  ->onDelete('cascade');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade');

            $table->unique(array('group_id', 'student_id'));

            $table->tinyInteger('reports_count')->unsigned()->nullable();
            $table->tinyInteger('lessons_count')->unsigned()->nullable();
            $table->tinyInteger('average_mark')->unsigned()->nullable();

            // 'reports_count', 'lessons_count', 'average_mark'
        });
    }

    public function down()
    {
        Schema::dropIfExists('group_student');
    }
}
