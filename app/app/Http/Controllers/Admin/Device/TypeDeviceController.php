<?php

namespace App\Http\Controllers\Admin\Device;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeviceType;

class TypeDeviceController extends Controller
{
    public function index()
    {
    	$types = DeviceType::get();
    	return response()->json([
    		'title' => 'Список типов оборудования',
    		'success' => true,
    		'view' => view('admin.device.type.index', compact('types'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'title' => 'Добавить новый тип оборудования',
    		'success' => true,
    		'view' => view('admin.device.type.add')->render(),
    	]);
    }

    public function store(Request $request)
    {
    	$typedevice = DeviceType::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.device.type.add', compact('typedevice'))->render(),
    	]);
    }

    public function edit(DeviceType $typedevice)
    {	
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование типа оборудования',
    		'view' => view('admin.device.type.add', compact('typedevice'))->render(),
    	]);
    }

    public function update(Request $request, DeviceType $typedevice)
    {
    	$typedevice->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.device.type.add', compact('typedevice'))->render(),
    	]);
    }

    public function delete(DeviceType $typedevice)
    {

    }
}
