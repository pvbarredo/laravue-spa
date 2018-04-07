<?php

namespace App\Model\Device;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    protected $fillable = ['code','name','type_id','unit'];
    

    public function criticalValue()
    {
        return $this->hasMany('App\Model\Device\CriticalValue', 'property_id');
	}

	public function type()
    {
        return $this->belongsTo('App\Model\Device\Type', 'type_id');
	}

}
