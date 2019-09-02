<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CategoryProduct;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(CategoryProduct::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => $faker->slug,
        'status' => rand(1,3),
        'parent_id' => rand(1, 5),
        'user_id' => rand(1, 2),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
