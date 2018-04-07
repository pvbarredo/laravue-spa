<?php

namespace App\Model\Device;

use Illuminate\Database\Eloquent\Model;

class DeviceData extends Model
{
   protected $table = 'device_data';
   protected $fillable = ['data','device_id','property_id', 'date','latitude','longitude'];

   public function device()
    {
        return $this->belongsTo('App\Model\Device\Device', 'device_id');
	}

	public function property()
    {
        return $this->belongsTo('App\Model\Device\Property', 'property_id');
	}
}
