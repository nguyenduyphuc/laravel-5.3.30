<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'featured' => 1,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price'=>rand(50000, 3000000),
        'compare_price'=>rand(50000, 3000000),
        'quantity'=>rand(0, 100),
        'weight'=>rand(100, 1000),
        'summary' => $faker->text,
        'description' => $faker->text,
        'status'=>1,
        'category_id' => rand(1, 5),
    ];
});
