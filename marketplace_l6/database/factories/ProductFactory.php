<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->sentence,
        'body' => $faker->paragraphs(5,true),
        'price' => $faker->randomFloat(2,1,10),
    ];
});
