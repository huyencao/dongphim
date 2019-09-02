<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Contact::class, function (Faker $faker) {
    $name = $faker->sentence;
    $slug = str_slug($name, '-');

    return [
        'fullname' => $faker->name,
        'phone'=> $faker->slug,
        'email' => 'image',
        'content' => rand(1,3),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
