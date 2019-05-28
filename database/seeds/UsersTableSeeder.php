<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        static $password;

        DB::table('users')->insert([
    		'name' => "admin",
	        'email' => "admin@vbschool.com",
	        'password' => $password ?: $password = bcrypt('123123123'),
	        'remember_token' => str_random(10),
    	]);
    }
}
