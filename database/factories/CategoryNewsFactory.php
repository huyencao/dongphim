<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CategoryNews;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(CategoryNews::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => $faker->slug,
        'parent_id' => rand(1, 5),
        'status' => rand(1,3),
        'user_id' => rand(1,2),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
