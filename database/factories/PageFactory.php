<?php

/** @var Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Page::class, static function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'body' => $faker->sentences(6, true),
        'published' => $faker->boolean,
        'slug' => $faker->slug,
    ];
});
