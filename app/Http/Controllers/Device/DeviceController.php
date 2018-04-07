<?php

namespace App\Http\Controllers\Device;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Device\Device;


class DeviceController extends Controller
{
    public function index()
    {
        return Device::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        return response()->json(Device::create([
        	'name' => $request->get('name'),
        	'username' => $request->get('username'),
        	'mac_address' => $request->get('mac_address'),
        	'password' => bcrypt($request->get('password')),
        ]) ) ;
    }

     public function show($id)
    {
        return response()->json(Device::with('type.property.criticalValue')->find($id));
    }


}
