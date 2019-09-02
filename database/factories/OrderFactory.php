<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'phone' => str_slug($faker->name),
        'email' => rand(1,10),
        'city' => rand(1,64),
        'district' => rand(1,100),
        'payment_method' => 'Thanh toan khi nhan hang',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
