<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use App\Profile;
use App\Topic;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(Profile::class)->create()->user->id,
        'post' => $faker->paragraph(25),
        'topic_id' => factory(Topic::class)->create()->id,
        'title' => $faker->sentence()
    ];
});
