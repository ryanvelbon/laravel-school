<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class TutorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tutors')->delete();

        $tutors = factory(App\Tutor::class, 5)->create();
    }
}
