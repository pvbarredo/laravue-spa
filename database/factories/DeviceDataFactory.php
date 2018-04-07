<?php

use Faker\Generator as Faker;


$factory->define(App\Model\Device\DeviceData::class, function (Faker $faker) {
    return [
        'device_id' => '1',
		'property_id' => '1',
		'value' => $faker->numberBetween(1,1000)
    ];
});
