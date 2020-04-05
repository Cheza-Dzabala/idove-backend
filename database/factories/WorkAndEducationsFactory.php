<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\WorkAndEducations;
use Faker\Generator as Faker;

$factory->define(WorkAndEducations::class, function (Faker $faker) {
    return [
        'profile_id' => factory(Profile::class)->create()->id,
        'institution' => $faker->sentence(),
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'job_description' => $faker->text(400),
    ];
});
