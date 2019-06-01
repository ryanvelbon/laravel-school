<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class AssignmentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('assignments')->delete();

		$subjects = App\Subject::all();
		$levels = App\SubjectLevel::all();

		$faker = Faker\Factory::create();

		$weights = array(10, 20, 50, 70, 80, 100, 150);

		$num_of_types = sizeof(Config::get('constants.assignment_types'));

		foreach($subjects as $subject){
			foreach($levels as $level){
				for($i=0; $i<random_int(0,20); $i++){

					$custom_id = $this->generateCustomId();
					$title = "Lorem Ipsum";
					$marks_available = $weights[array_rand($weights)];

					DB::table('assignments')->insert(
						['custom_id' => $custom_id,
						 'title' => $title,
						 'type' => random_int(0,$num_of_types-1),
						 'marks_available' => $marks_available,
						 'pass_mark' => (int) $marks_available/2,
						 'subject_id' => $subject->id,
						 'level_id' => $level->id,]
					);
				}
			}
		}
    }

    private function generateCustomId(){

    	$str = "";
    	
    	for($i=0; $i<4; $i++){
    		if(random_int(1, 36) <= 26)
    		{
    			$str .= chr(rand(65,90)); // upper-case letter
    		}else{
    			$str .= chr(rand(48,57)); // digit
    		}
    		
    	}

    	return $str;
    }
}
