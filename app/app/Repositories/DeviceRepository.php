<?php

namespace App\Repositories;

use App\Models\Device;

/**
 * 
 */
class DeviceRepository
{
	
	public function getDevices($data = [])
	{
		$query = Device::query()->with('type');

    	if(isset($data['brand_id']))
    		$query->join('device_brands', 'device_brands.device_id', '=', 'devices.id')
    			->where('device_brands.brand_id', $data['brand_id']);

    	$devices = $query
    		->orderBy('devices.device_type_id')
    		->orderBy('devices.name')
    		->get()
    		->groupBy('device_type_id');

    	return $devices;
	}
}