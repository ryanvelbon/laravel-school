<?php

use Illuminate\Database\Seeder;

class ReportTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('report_types')->delete();

        $report_types = array('Attendance', 'Performance', 'Homework', 'Participation', );

        foreach($report_types as $report_type) {
        	DB::table('report_types')->insert([
        		'title' => $report_type,
        	]);
        }
    }
}
