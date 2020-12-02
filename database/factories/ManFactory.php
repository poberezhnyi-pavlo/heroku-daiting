<?php

/** @var Factory $factory */

use App\Models\Man;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Man::class, static function (Faker $faker) {
    return [
        'credits' => $faker->numberBetween(0, 1000),
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->address,
        'post_index' => $faker->postcode,
        'birth_day' => $faker->date(),
        'height' => $faker->numberBetween(160, 200),
        'weight' => $faker->numberBetween(50, 100),
        'eye_color' => $faker->randomElement(Man::EYE_COLORS),
        'hair_color' => $faker->randomElement(Man::HAIR_COLORS),
        'about_myself' => $faker->sentence(),
        'interests' => $faker->sentence(),
        'education' => $faker->sentence(),
        'job' => $faker->company,
        'creed' => $faker->word,
        'bad_habits' => $faker->sentence(),
        'langs' => [$faker->languageCode],
        'age_of_woman' => $faker->numberBetween(20, 40),
        'about_woman' => $faker->sentence(),
    ];
});
