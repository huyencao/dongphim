<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(News::class, function (Faker $faker) {
    $name = $faker->sentence;
    $slug = str_slug($name, '-');

    return [
        'title' => $faker->name,
        'slug'=> $faker->slug,
        'cate_id' => rand(1, 5),
        'thumbnail' => 'image',
        'status' => rand(1,3),
        'description' => $faker->text(200),
        'content' => $faker->text(500),
        'author' => 'Nguyen Ngoc Anh',
        'hot' => rand(0,1),
        'user_id' => rand(1, 2),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
