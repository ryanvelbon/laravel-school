<?php

use Illuminate\Database\Seeder;

class AssignmentTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('assignment_types')->delete();

        $assignment_types = array("Class Test", "Online Test", "Homework", "Multiple Choice");

        foreach($assignment_types as $assignment_type) {
        	DB::table('assignment_types')->insert([
        		'title' => $assignment_type,
        	]);
        }
    }
}
