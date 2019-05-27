<?php

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('classrooms')->delete();

        DB::table('classrooms')->insert(['room_number' => 101, 'capacity' => 25,]);
        DB::table('classrooms')->insert(['room_number' => 102, 'capacity' => 18,]);
        DB::table('classrooms')->insert(['room_number' => 201, 'capacity' => 30,]);
        DB::table('classrooms')->insert(['room_number' => 301, 'capacity' => 12,]);
    }
}
