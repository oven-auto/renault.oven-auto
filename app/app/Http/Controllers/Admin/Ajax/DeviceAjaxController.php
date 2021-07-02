<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Repositories\DeviceRepository;

class DeviceAjaxController extends Controller
{
	
	private $repository;

	public function __construct(DeviceRepository $repository)
	{
		$this->repository = $repository;
	}

    public function list(Request $request)
    {
     	$devices = $this->repository->getDevices($request->all());

    	return response()->json([
    		'title' => 'Список оборудования',
    		'view' => view('admin.device.modal.list', compact('devices'))->render(),
    		'success' => true
    	]);
    }
}
