<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title'             => $faker->word,
        'title_en'          => $faker->word,
        'description'       => $faker->paragraph,
        'description_en'    => $faker->paragraph,
        'poster_url'        => $faker->imageUrl(235, 320, 'cats',true)
    ];
});
