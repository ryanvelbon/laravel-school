<?php

use Illuminate\Database\Seeder;

class GroupStudentTableSeeder extends Seeder
{
    public function run()
    {
    	$groups = App\Group::all();

        foreach($groups as $group){
        	// determine level and hence suitable form

        	$students = App\Student::where('form', $form)->inRandomOrder()->take($numOfStudents)->get();

        	foreach ($students as $student) {
        		DB::table('group_student')->insert(
	        		['group_id' => $group->id, 'student_id' => $student->id]
	        	);
        	}
        }
    }
}
