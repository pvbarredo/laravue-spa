<?php

namespace App\Model\Device;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'device_type';
    protected $fillable = ['icon','code','name'];

    public function device()
    {
        return $this->belongsTo('App\Model\Device\Device', 'device_id');
	}

	public function property()
    {
        return $this->hasMany('App\Model\Device\Property', 'type_id');
	}


}
