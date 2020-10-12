<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forum;
use App\Model;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {
    return [
        'admin_id' => factory(Profile::class)->create()->user->id,
        'title' => $faker->sentence(),
        'description' => $faker->paragraph()
    ];
});
