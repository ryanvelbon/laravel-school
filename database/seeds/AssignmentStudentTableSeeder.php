<?php

use Illuminate\Database\Seeder;

class AssignmentStudentTableSeeder extends Seeder
{
	// BUG: 1062 Duplicate entry '33-2' for key 'assignment_student_assignment_id_student_id_unique'
	
    public function run()
    {
        DB::table('assignment_student')->delete();

		$groups = App\Group::all();

		foreach($groups as $group){

			$assignments = App\Assignment::where('subject_id', $group->subject_id)
										->where('level_id', $group->level_id)
										->get();
			
			foreach ($assignments as $assignment) {
				foreach($group->students as $student){

					$submitted = random_int(0, 1);

					$mark = ($submitted) ? random_int(0, $assignment->marks_available) : 0 ;

					DB::table('assignment_student')->insert(
						['assignment_id' => $assignment->id,
						 'student_id' => $student->id,
						 'deadline' => date('Y-m-d', random_int(1546297200, 1559340000)),
						 'submitted' => $submitted,
						 'mark' => $mark,
					]);
				}
			}
		}
    }
}
