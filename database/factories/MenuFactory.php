<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Menu;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => str_slug($faker->name),
        'status' => rand(1,3),
        'link' => 'trang-chu',
        'parent_id' => rand(1,4),
        'user_id' => rand(1, 2),
        'position' => rand(1, 5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
