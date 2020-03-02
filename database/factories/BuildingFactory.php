<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Building;
use Faker\Generator as Faker;

$factory->define(Building::class, function (Faker $faker) {
    return [
        'building_name' => $faker->name,
        'building_address'=> $faker->address,
        'building_city' => $faker ->city,
        'building_postalCode' => $faker->postcode,
        'client_id' => function () {
            return factory(App\Client::class)->create()->id;
        }
    ];
});
