<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        // ['name', 'slug', 'phone', 'description'];
        'name'=>$faker->name,
        'slug'=>$faker->slug,
        'phone'=>$faker->phoneNumber,
        'description'=>$faker->sentence,

    ];
});
