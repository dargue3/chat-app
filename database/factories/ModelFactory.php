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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return ['username' => $faker->word];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
  $IDs = App\User::all(['username'])->pluck('username')->toArray();
  $from = $IDs[array_rand($IDs)];

  return [
    'from' => $faker->word,
    'message' => $faker->sentence
  ];
});
