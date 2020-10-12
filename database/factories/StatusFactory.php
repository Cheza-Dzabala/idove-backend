<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use App\StatusUpdate;
use App\User;
use Faker\Generator as Faker;

$factory->define(StatusUpdate::class, function (Faker $faker) {
    $profile = factory(Profile::class)->create();
    return [
        'update' => $faker->paragraph(1),
        'user_id' => $profile->user->id
    ];
});
