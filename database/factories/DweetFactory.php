<?php

use Faker\Generator as Faker;

$factory->define(App\Dweet::class, function (Faker $faker) {
    return [
    	'text' => $faker->sentence
    ];
});
