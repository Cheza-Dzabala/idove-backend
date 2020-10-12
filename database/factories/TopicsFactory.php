<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forum;
use App\Model;
use App\Profile;
use App\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'creator' => factory(Profile::class)->create()->user->id,
        'title' => $faker->sentence(),
        'forum_id' => factory(Forum::class)->create()->id
    ];
});
