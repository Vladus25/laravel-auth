<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
  return [
    'name' => $faker -> firstName,
    'model' => $faker -> lastName,
    'kw' => $faker -> numberBetween(1000, 9000),
  ];
});
