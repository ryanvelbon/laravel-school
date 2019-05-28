<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->delete();

        $students = factory(App\Student::class, 30)->create();
    }
}
