<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Device\Device;

class MapController extends Controller
{
	public function getDeviceData()
    {
        return Device::get();
    }

}
