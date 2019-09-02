<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(District::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'city_id' => rand(1, 64),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
