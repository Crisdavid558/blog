<?php

use Faker\Generator as Faker;

$factory->define(App\ArticleImage::class, function (Faker $faker) {
    return [
        'nombre'=>\Faker\Provider\Image::image(storage_path().'/app/public/imagenesArticulos',250, 250, 'nature',false),
        'article_id'=>$faker->numberBetween(1,50),
    ];
});
