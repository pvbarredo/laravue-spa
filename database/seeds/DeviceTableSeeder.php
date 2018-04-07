<?php

use Illuminate\Database\Seeder;
use App\Model\Device\Device;
use App\Model\Device\Type;
use App\Model\Device\Property;
use App\Model\Device\CriticalValue;


class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$type1 = Type::create([
    		'icon' => 'icon.jpg',
    		'code' => 'Water',
    		'name' => 'Water',
    	]);

       $device1 =  Device::create([
        	'name' => 'Device 1',
        	'username' => 'device1',
        	'mac_address' => '5b:5n:po:Gi:Pe:Te:r1',
          'password' => bcrypt('admin125'),
          'user_id' => '2',
          'type_id' => $type1->id,
          'description'=> 'Properties in water wherein fishes can live'

        ]);

       $type1_property1 = Property::create([
       		'code'=> 'DO',
       		'name' => 'Dissolved Oxygen',
          'unit' => 'PPM',
       		'type_id' => $type1->id
       ]);

       
       $property1_criticalValue1 = CriticalValue::create([
       		'property_id' => $type1_property1->id,
       		'min_value' => 3.0,
          'max_value' => 0,
          'description' => 'Fish cant live in this water',
          'condition' => 'Exact'

       ]);

       $property1_criticalValue2 = CriticalValue::create([
          'property_id' => $type1_property1->id,
          'min_value' => 6.0,
          'max_value' => 9.0,
          'description' => 'Fish can survive in this water',
          'condition' => 'Range'

       ]);

       $type1_property2 = Property::create([
          'code'=> 'NA',
          'name' => 'Sodium',
          'unit' => 'mg/L',
          'type_id' => $type1->id
       ]);

       $property1_criticalValue2 = CriticalValue::create([
          'property_id' => $type1_property2->id,
          'min_value' => 400,
          'max_value' => 0,
          'description' => 'Stressful to fishes',
          'condition' => 'Exact'

       ]);



       //================================================================

       $type2 = Type::create([
          'icon' => 'icon.jpg',
          'code' => 'Air',
          'name' => 'Air',
        ]);

       $device2 =  Device::create([
          'name' => 'Device 2',
          'username' => 'device2',
          'mac_address' => '5b:5n:p:125:52:11',
          'password' => bcrypt('admin125'),
          'user_id' => '2',
          'type_id' => $type2->id,
          'description'=> 'Level of CO2 harmful to human'

        ]);

       $type2_property1 = Property::create([
          'code'=> 'CO2',
          'name' => 'Carbon Dioxide',
          'unit' => 'PPM',
          'type_id' => $type2->id
       ]);

       $property1_criticalValue1 = CriticalValue::create([
          'property_id' => $type2_property1->id,
          'min_value' => 400,
          'max_value' => 0,
          'description' => 'Harmful to human',
          'condition' => 'Above'

       ]);

       //===========================================================
       $type3 = Type::create([
          'icon' => 'icon.jpg',
          'code' => 'Soil',
          'name' => 'Soil',
        ]);

       $device3 =  Device::create([
          'name' => 'Device 3',
          'username' => 'device3',
          'mac_address' => '5b:5n:12:5a:p:125:52:11',
          'password' => bcrypt('admin125'),
          'user_id' => '2',
          'type_id' => $type3->id,
          'description'=> 'Level of K Good for planting'

        ]);

       $type3_property1 = Property::create([
          'code'=> 'POT',
          'name' => 'Potassium',
          'unit' => 'PPM',
          'type_id' => $type3->id
       ]);

       $property1_criticalValue1 = CriticalValue::create([
          'property_id' => $type3_property1->id,
          'min_value' => 20000,
          'max_value' => 0,
          'description' => 'Good for plants',
          'condition' => 'Exact'

       ]);

       //===========================================================

       $type4 = Type::create([
          'icon' => 'icon.jpg',
          'code' => 'Air',
          'name' => 'Air',
        ]);

       $device4 =  Device::create([
          'name' => 'Device 4',
          'username' => 'device4',
          'mac_address' => '5b:5n:12:5a:p:1asd:325:52:11',
          'password' => bcrypt('admin125'),
          'user_id' => '2',
          'type_id' => $type4->id,
          'description'=> 'Cause of Acid Rain'

        ]);

       $type4_property1 = Property::create([
          'code'=> 'PH',
          'name' => 'PH',
          'unit' => 'PPM',
          'type_id' => $type4->id
       ]);

       $property1_criticalValue1 = CriticalValue::create([
          'property_id' => $type4_property1->id,
          'min_value' => 5,
          'max_value' => 0,
          'description' => 'Prone to acid rain',
          'condition' => 'Above'

       ]);
       //===========================================================

       $type5 = Type::create([
          'icon' => 'icon.jpg',
          'code' => 'Air',
          'name' => 'Air',
        ]);

       $device5 =  Device::create([
          'name' => 'Device 5',
          'username' => 'device5',
          'mac_address' => '5b:5n:12:5a:ps2:1asd:325:52:11',
          'password' => bcrypt('admin125'),
          'user_id' => '2',
          'type_id' => $type5->id,
          'description'=> 'O3 harmful to human'

        ]);

       $type5_property1 = Property::create([
          'code'=> 'OZ',
          'name' => 'Ozone',
          'unit' => 'ppb',
          'type_id' => $type5->id
       ]);

       $property1_criticalValue1 = CriticalValue::create([
          'property_id' => $type5_property1->id,
          'min_value' => 4.0,
          'max_value' => 0,
          'description' => 'Harmful to human',
          'condition' => 'Below'

       ]);


    }
}
