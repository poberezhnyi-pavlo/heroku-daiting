<?php

/** @var Factory $factory */

use App\Models\Page;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

$factory->define(Page::class, static function () {
    $langs = [];

    $faker = Faker::create();
    foreach (LaravelLocalization::getSupportedLocales() as $key=>$locale) {
        $faker->locale($locale['regional']);

        $langs[$key] = [
            'title' => $faker->realText(20),
            'body' => $faker->realText(10000),
        ];
    }

    return array_merge([
        'published' => $faker->boolean,
        'slug' => $faker->slug,
    ], $langs);
});

$factory->state(Page::class, Page::PAGE_TYPE_ABOUT, [
    'type' => Page::PAGE_TYPE_ABOUT,
]);

$factory->state(Page::class, Page::PAGE_TYPE_INFORMATION, [
    'type' => Page::PAGE_TYPE_INFORMATION,
]);

$factory->state(Page::class, Page::PAGE_TYPE_SERVICES, [
    'type' => Page::PAGE_TYPE_SERVICES,
]);
