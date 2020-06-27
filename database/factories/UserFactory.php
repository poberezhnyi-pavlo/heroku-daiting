<?php

/** @var Factory $factory */

use App\Models\Man;
use App\Models\User;
use App\Models\Woman;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, static function (Faker $faker) {
    $userType = $faker->randomElement([
        Woman::class,
        Man::class,
    ]);

    $userable = factory($userType)->create();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->phoneNumber,
        'role' => $faker->randomElement([
            User::ROLE_ADMIN,
            User::ROLE_EDITOR,
        ]),
        'avatar' => $faker->imageUrl(640, 480, 'people'),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'user_type_type' => $userType,
        'user_type_id' => $userable->id,
    ];
});
