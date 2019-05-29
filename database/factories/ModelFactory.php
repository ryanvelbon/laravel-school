<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tutor::class, function (Faker\Generator $faker) {
	return [
		'full_name' => $faker->name,
	];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'sex' => (bool)random_int(0, 1),
        'form' => random_int(1, 7),
        'school_id' => App\School::inRandomOrder()->first()->id,
        'email1' => $faker->email,
        'email2' => $faker->email,
        'mob1' => "99" . sprintf('%06d', random_int(0,999999)),
        'mob2' => "99" . sprintf('%06d', random_int(0,999999)), // Find DRY solution
    ];
});

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    
    $start_time = 8*60 + random_int(0, 20)*30;

    return [
        'custom_id' => chr(64+rand(0,26))."".chr(64+rand(0,26))."".chr(64+rand(0,26))."".chr(64+rand(0,26))."".chr(64+rand(0,26))."".chr(64+rand(0,26)), //temp lol
        'subject_id' => App\Subject::inRandomOrder()->first()->id,
        'level_id' => App\SubjectLevel::inRandomOrder()->first()->id,
        'tutor_id' => App\Tutor::inRandomOrder()->first()->id,
        'classroom_id' => App\Classroom::inRandomOrder()->first()->id,
        'weekday' => random_int(0, 5),
        'start_time' => $start_time,
        'end_time' => $start_time + 60 + random_int(0, 4)*30,
    ];
});