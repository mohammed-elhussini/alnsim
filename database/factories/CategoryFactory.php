<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'title' =>  $faker->word,
        //'content' => $faker->paragraphs(3) ,
        //'content' => $faker->sentence ,
        'content' => $faker->text($maxNbChars = 200) ,
        'thumbnail' => $faker->imageUrl(),
    ];
});
