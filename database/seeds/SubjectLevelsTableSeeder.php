<?php

use Illuminate\Database\Seeder;

class SubjectLevelsTableSeeder extends Seeder
{
	public function run()
    {
        DB::table('subject_levels')->delete();

        $levels = array('Form 1', 'Form 2', 'Form 3', 'Form 4', 'Form 5 (Paper A)', 'Form 5 (Paper B)', 'Intermediate', 'A-Level');

        foreach($levels as $level) {
        	DB::table('subject_levels')->insert([
        		'title' => $level,
        	]);
        }
    }
}
