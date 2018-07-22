<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'order_date' => $faker->dateTimeBetween('tomorrow', '+3 days'),
        'open' => $faker->boolean
    ];
});
