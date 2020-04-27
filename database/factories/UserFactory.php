<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'alias' => $faker->unique()->word,
        'bloqueado' => $faker->boolean(false),
        'es_admin' => $faker->boolean(false),
        'password' => bcrypt('12345'),
        'remember_token' => Str::random(10),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now', 'America/Chihuahua'),
    ];
});
