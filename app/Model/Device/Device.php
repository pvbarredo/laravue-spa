<?php

namespace App\Model\Device;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'device';
    protected $fillable = ['name','username','description','mac_address','password','user_id','type_id'];

    public function owner()
    {
        return $this->belongsTo('App\Model\User\User', 'user_id');
	}

	public function type()
    {
        return $this->belongsTo('App\Model\Device\Type', 'type_id');
	}
}
