<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

use App\Helpers\AllahuFoobar;

class AssignmentsTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('assignments')->delete();

		$subjects = App\Subject::all();
		$levels = App\SubjectLevel::all();

		$faker = Faker\Factory::create();

		$weights = Config::get('constants.assignment_weightings');

		foreach($subjects as $subject){
			foreach($levels as $level){
				for($i=0; $i<random_int(0,20); $i++){

					$custom_id = AllahuFoobar::random_alphanumeric_id(4);
					$title = "Lorem Ipsum";
					$assignment_type = App\AssignmentType::inRandomOrder()->first();
					$marks_available = $weights[array_rand($weights)];

					DB::table('assignments')->insert(
						['custom_id' => $custom_id,
						 'title' => $title,
						 'assignment_type_id' => $assignment_type->id,
						 'marks_available' => $marks_available,
						 'pass_mark' => (int) $marks_available/2,
						 'subject_id' => $subject->id,
						 'level_id' => $level->id,]
					);
				}
			}
		}
    }
}
