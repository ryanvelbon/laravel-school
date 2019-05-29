<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('lessons')->delete();

        $groups = App\Group::all();

        $faker = Faker\Factory::create();

        foreach($groups as $group){

        	$numOfLessons = random_int(1, 4)*10 + random_int(0,5);

            $duration = ($group->end_time - $group->start_time) * 60; // lesson duration in seconds
            
            $hour = (int) $group->start_time/60;
            $minute = $group->start_time%60;
            $datetimeStart = mktime($hour,$minute,0,7,13+$group->weekday,2020); // date and time of first lesson

            for($i=0; $i < $numOfLessons; $i++){

                $description = NULL;

                if(rand(1,7) == 1){
                    $description = $faker->sentence($nbWords = 20, $variableNbWords = true);
                    $description = substr($description,0,199);
                }

                DB::table('lessons')->insert(
                   ['group_id' => $group->id,
                    'classroom_id' => $group->classroom_id,
                    'starts' => date("Y-m-d H:i:s", $datetimeStart),
                    'ends' => date("Y-m-d H:i:s", $datetimeStart + $duration),
                    'description' => $description,]
                );

                $datetimeStart += 86400 * 7; // 1 day is 86400 seconds
            }
        }        
    }
}