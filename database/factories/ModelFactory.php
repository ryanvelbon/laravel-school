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
