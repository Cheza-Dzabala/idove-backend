<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Groups;
use App\Model;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Groups::class, function (Faker $faker) {
    $profile = factory(Profile::class)->create();
    return [
        'admin_id' => 2,
        'name' => $faker->paragraph(1),
        'description' => $faker->paragraph(3),
        'avatar' => $faker->imageUrl(300, 300)
    ];
});
