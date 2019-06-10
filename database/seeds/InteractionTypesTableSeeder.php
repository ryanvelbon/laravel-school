<?php

use Illuminate\Database\Seeder;

class InteractionTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('interaction_types')->delete();

        $interaction_types = array('Phone Call', 'SMS', 'e-Mail', 'In Person');

        foreach($interaction_types as $interaction_type) {
        	DB::table('interaction_types')->insert([
        		'title' => $interaction_type,
        	]);
        }
    }
}
