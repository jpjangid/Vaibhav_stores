<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'enrollment' => $faker->unique()->randomNumber($nbDigits = NULL, $strict = true),
        'name' => $faker->name,
        'father_name' => $faker->name,
        'mother_name' => $faker->name,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'course_id' => '464e33d7-1e9d-4e7b-881b-5298e1e86f1f',
        'stream_id' => '44620e94-2e46-46fb-b0a0-0da4948e9117',

    ];
});
