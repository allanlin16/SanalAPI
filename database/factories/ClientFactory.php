<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'client_name' => $faker->name,
        'client_phone'=> $faker->phoneNumber,
        'client_address' => $faker ->address,
        'client_email' => $faker->safeEmail


    ];
});
