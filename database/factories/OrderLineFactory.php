<?php

use Faker\Generator as Faker;

$factory->define(App\OrderLine::class, function (Faker $faker) {
    return [
        'user_id' => associateTo(\App\User::class),
        'order_id' => associateTo(\App\Order::class),
        'paid' => $faker->boolean,
    ];
});
