<?php

use Illuminate\Database\Seeder;

class GroupStudentTableSeeder extends Seeder
{
    public function run()
    {
    	$groups = App\Group::all();

        foreach($groups as $group){
        	
        	$level = App\SubjectLevel::find($group->level_id)->custom_id;

        	$validForms = [];

        	switch ($level) {
			    case 'F1': $validForms = [1]; break;
			    case 'F2': $validForms = [2]; break;
			    case 'F3': $validForms = [3]; break;
			    case 'F4': $validForms = [4]; break;
			    case 'F5A': $validForms = [0, 5]; break;
			    case 'F5B': $validForms = [0, 5]; break;
			    case 'INT': $validForms = [0,6,7]; break;
			    case 'ADV': $validForms = [0,6,7]; break;
			    default:
			        // ? ? ?
			}

			$numOfStudents = random_int(10, 25);

        	$students = App\Student::whereIn('form', $validForms)->inRandomOrder()->take($numOfStudents)->get();

        	foreach ($students as $student) {
        		DB::table('group_student')->insert(
	        		['group_id' => $group->id, 'student_id' => $student->id]
	        	);
        	}
        }
    }
}
