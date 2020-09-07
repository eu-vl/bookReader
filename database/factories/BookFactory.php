<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookReader\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(30),
        'description' => $faker->realText(),
    ];
});
