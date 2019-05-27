<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->delete();

        $subjects = array('Mathematics', 'Physics', 'Biology', 'Accounts', 'Chemistry');

        foreach($subjects as $subject) {
        	DB::table('subjects')->insert([
        		'title' => $subject,
        	]);
        }
    }
}
