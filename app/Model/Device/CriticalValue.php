<?php

namespace App\Model\Device;

use Illuminate\Database\Eloquent\Model;

class CriticalValue extends Model
{
    protected $table = 'critical_value';
    protected $fillable = ['min_value','max_value','condition','description','property_id'];

    public function property()
    {
        return $this->belongsTo('App\Model\Device\Property', 'property_id');
	}
}
