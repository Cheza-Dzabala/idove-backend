<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str as Str;

$factory->define(Profile::class, function (Faker $faker) {
    $user = factory(User::class)->create();
    return [
        'user_id' => $user->id,
        'slug' => Str::slug($user->username),
        'summary' => $faker->text,
        'avatar' => $faker->imageUrl(300, 300),
        'cover_image' => $faker->imageUrl(1268, 423),
        'date_joined' => $faker->date(),
        'date_of_birth' => $faker->date(),
        'gender' => $faker->randomElement([
            'M',
            'F',
            'NB'
        ]),
        'area_of_expertise' => $faker->randomElement([
            'PM',
            'CW',
            'AR',
            'CR',
            'OT'
        ]),
        'physical_address' => $faker->streetAddress,
        'marital_status' => $faker->randomElement([
            'Single',
            'Married',
            'Divorced',
            'Prefer Not To Say',
        ]),
        'gender' => $faker->randomElement(['M', 'F']),
        'country_of_residence' => $faker->countryCode,
        'city_of_residence' => $faker->city,
        'pve_work' => $faker->text,
        'religion' => $faker->randomElement([
            'Christian',
            'Muslim',
            'Bahai',
            'Agnostic',
            'Athiest',
        ]),
        'hobbies' => $faker->text(500),
        'favourite_tv_shows' => $faker->text(400),
        'favourite_movies' => $faker->text(400),
        'favourite_music_bands' => $faker->text(400),
        'favourite_books' => $faker->text(400),
        'favourite_writers' => $faker->text(400),
        'favourite_games' => $faker->text(400),
        'other_interests' => $faker->text(400),
        'phone_number' => $faker->phoneNumber,
        'nationality' => $faker->countryCode,
        'twitter' => $faker->url,
        'facebook' => $faker->url,
        'linked_in' => $faker->url,
        'instagram' => $faker->url,
        'website' => $faker->url,
    ];
});
