<?php

use Illuminate\Database\Seeder;

class SubjectLevelsTableSeeder extends Seeder
{
	public function run()
    {

        // This Solution is retarded. Find a better one.
        
        DB::table('subject_levels')->delete();

        $levels = array(
            'F1' => 'Form 1',
            'F2' => 'Form 2',
            'F3' => 'Form 3',
            'F4' => 'Form 4',
            'F5A' => 'Form 5 (Paper A)',
            'F5B' => 'Form 5 (Paper B)',
            'INT' => 'Intermediate',
            'ADV' => 'A-Level');

        $keys = array_keys($levels);
        $values = array_values($levels);

        for ($x = 0; $x < sizeof($levels); $x++) {
            DB::table('subject_levels')->insert([
                'custom_id' => $keys[$x],
                'title' => $values[$x],
            ]);
        }
    }
}
