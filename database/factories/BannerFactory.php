<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'status' => rand(1,2),
        'thumbnail' => 'image banner',
        'user_id' => rand(1,2),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
