<?php

use Faker\Generator as Faker;

$factory->define(WhatsShop\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'description' => $faker->text(50),
        'slug' => 'slugs'
    ];
});
