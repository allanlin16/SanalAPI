<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Extinguisher;
use Faker\Generator as Faker;

$factory->define(Extinguisher::class, function (Faker $faker) {
    return [
        'extinguisher_make' => $faker->domainName,
        'extinguisher_serialnumber' => $faker->bankAccountNumber,
        'extinguisher_barcodenumber' => $faker->bankAccountNumber,
        'extinguisher_locationarea' => $faker->buildingNumber,
        'extinguisher_locationdescription' => $faker->text,
        'extinguisher_type' => $faker->text,
        'extinguisher_rating' => $faker->text,
        'extinguisher_size' => $faker->randomDigit,
        'extinguisher_manufacturedate' => $faker->date('Y-m-d'),
        'extinguisher_htestdate' => $faker->date('Y-m-d'),
        'extinguisher_servicedate' => $faker->date('Y-m-d'),
        'extinguisher_nextservicedate' => $faker->date('Y-m-d'),
        'extinguisher_comment' => $faker->text,
        'extinguisher_status' => $faker->text,
        'building_id' => function () {
            return factory(App\Building::class)->create()->id;
        }
    ];
});
