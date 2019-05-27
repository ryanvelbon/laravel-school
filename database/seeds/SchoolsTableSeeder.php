<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('schools')->delete();

        $schools = array('San Andrea', 'San Anton', 'St Aloysius', 'St Michaels', 'St Catherines');

        foreach($schools as $school) {
        	DB::table('schools')->insert([
        		'title' => $school,
        	]);
        }
    }
}
