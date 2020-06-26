<?php

/** @var Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Setting::class, static function (Faker $faker) {
    return [
        'key' => $faker->word,
        'name' => $faker->word,
        'value' => $faker->sentence(3),
        'append' => $faker->word,
        'description' => $faker->sentence(10),
    ];
});
