<?php

/** @var Factory $factory */

use App\Models\Page;
use Illuminate\Database\Eloquent\Factory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

$factory->define(Page::class, static function () {
    $langs = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key=>$locale) {
        $faker = \Faker\Factory::create($locale['regional']);
        $langs[$key] = [
            'title' => $faker->realText(20),
            'body' => $faker->realText(),
        ];
    }

    return array_merge([
        'published' => $faker->boolean,
        'slug' => $faker->slug,
    ], $langs);
});
