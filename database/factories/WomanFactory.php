<?php

/** @var Factory $factory */

use App\Models\Woman;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Woman::class, static function (Faker $faker) {
    return [
        'birth_date' => $faker->date(),
        'amount_of_children' => $faker->randomDigit,
        'height' => $faker->numberBetween(160, 200),
        'weight' => $faker->numberBetween(50, 100),
        'eye_color' => $faker->randomElement(Woman::EYE_COLORS),
        'hair_color' => $faker->randomElement(Woman::HAIR_COLORS),
        'education' => $faker->sentence,
        'langs' => $faker->word, //TODO: change when will be more info
        'job' => $faker->company,
        'travel_countries' => $faker->country,
        'vizes' => $faker->country,
        'creed' => $faker->word,
        'bad_habits' => $faker->sentence(),
        'ideal_man' => $faker->sentence(),
        'about_myself' => $faker->sentence(10),
        'city' => $faker->city,
        'video_url' => $faker->randomElement([
            'x7GkebUe6XQ',
            'FYU-N2RWfso',
            'xQ_IQS3VKjA',
            'iXRSyj_mNis',
            '6xJ27BtlM0c',
        ]),
        'is_show_in_gallery' => $faker->boolean,

    ];
});
