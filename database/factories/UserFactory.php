<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\tbl_mosque::class, function (Faker $faker) {     
    return [
        'mosque_name' => $faker->name,
        'income' => $faker->numberBetween($min = 1000, $max = 50000),
        'expense' => $faker->numberBetween($min = 1000, $max = 200000),
        'account_no' => $faker->unique()->numberBetween($min = 0000000000, $max = 9999999999),
        'remember_token' => Str::random(10),
        'mukimID' => $faker->numberBetween($min = 1, $max = 56),
        'daerahID' => $faker->numberBetween($min = 1, $max = 10),
    ]; 
});
