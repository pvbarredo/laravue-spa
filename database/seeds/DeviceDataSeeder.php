<?php

use Illuminate\Database\Seeder;
use App\Model\Device\DeviceData;

class DeviceDataSeeder extends Seeder
{
   
    public function run()
    {
        $faker = Faker\Factory::create();
        
        DeviceData::create([
        	'device_id'=> '1',
        	'property_id' => '1',
        	'value' => 4,
            'latitude' => '14.473604',
            'longitude' => '121.080075'
        ]);

        DeviceData::create([
        	'device_id'=> '1',
        	'property_id' => '2',
        	'value' => 7,
            'latitude' => '14.550829',
            'longitude' => '121.019624'
        ]);

        DeviceData::create([
        	'device_id'=> '2',
        	'property_id' => '3',
        	'value' => 20000,
            'latitude' => '14.547756',
            'longitude' => '120.986065'
        ]);

        DeviceData::create([
        	'device_id'=> '3',
        	'property_id' => '4',
        	'value' => 20000,
            'latitude' => '14.424344',
            'longitude' => '120.961203'
        ]);
        
        DeviceData::create([
        	'device_id'=> '4',
        	'property_id' => '5',
        	'value' => 6,
            'latitude' => '14.509547',
            'longitude' => '121.050296'
        ]);

        DeviceData::create([
        	'device_id'=> '5',
        	'property_id' => '6',
        	'value' => 2,
            'latitude' => '14.663343',
            'longitude' => '121.030798'
        ]);

    	factory(App\Model\Device\DeviceData::class,20)->create([
		    'device_id' => '1',
			'property_id' => '1',
            'latitude' => '14.473604',
            'longitude' => '121.080075'			
		]);

		factory(App\Model\Device\DeviceData::class,20)->create([
		    'device_id' => '1',
			'property_id' => '2',
            'latitude' => '14.550829',
            'longitude' => '121.019624'
		]);

		factory(App\Model\Device\DeviceData::class,20)->create([
		    'device_id' => '2',
			'property_id' => '3',
            'latitude' => '14.547756',
            'longitude' => '120.986065'
		]);

		factory(App\Model\Device\DeviceData::class,20)->create([
		    'device_id' => '3',
			'property_id' => '4',
            'latitude' => '14.424344 ',
            'longitude' => '120.961203'
		]);

		factory(App\Model\Device\DeviceData::class,20)->create([
		    'device_id' => '4',
			'property_id' => '5',
            'latitude' => '14.509547',
            'longitude' => '121.050296'
		]);

		factory(App\Model\Device\DeviceData::class,20)->create([
		    'device_id' => '5',
			'property_id' => '6',
            'latitude' => '14.663343',
            'longitude' => '121.030798'
		]);



    }
}
