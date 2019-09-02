<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->sentence;
    $slug = str_slug($name, '-');

    return [
        'name' => $faker->name,
        'slug'=> $faker->slug,
        'cate_id' => rand(1, 5),
        'price_old' => rand(50000, 1000000),
        'sale' => rand(1, 20),
        'price_new' => rand(1, 20),
        'author' => 'aaaa',
        'publishing_company' => 'Kim Dong',
        'number_page' => rand(10, 200),
        'total' => rand(1, 100),
        'status' => rand(1,2),
        'detail' =>  $faker->text(200),
        'class' => 'Lop 1',
        'subjects' => 'Mon toan',
        'thumbnail' => 'Image book',
        'hot' => rand(0,1),
        'user_id' => rand(1, 2),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
