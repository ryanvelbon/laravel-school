<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('schools')->delete();

        $schools = array('St Filbert', 'St Clivert', 'St Maryjane', 'St Godfrey', 'St Rubert');

        foreach($schools as $school) {
        	DB::table('schools')->insert([
        		'title' => $school,
                'exam_date_hy' => date('Y-m-d', random_int(1579042800, 1582758000)),
                'exam_date_annual' => date('Y-m-d', random_int(1591221600, 1593381600)),
                'school_type' => random_int(0, 2),
        	]);
        }
    }
}