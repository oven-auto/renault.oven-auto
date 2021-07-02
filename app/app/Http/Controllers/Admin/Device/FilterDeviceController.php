<?php

namespace App\Http\Controllers\Admin\Device;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeviceFilter;

class FilterDeviceController extends Controller
{
    public function index()
    {
    	$filters = DeviceFilter::get();
    	return response()->json([
    		'title' => 'Список фильтров оборудования',
    		'success' => true,
    		'view' => view('admin.device.filter.index', compact('filters'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'title' => 'Добавить новый фильтр оборудования',
    		'success' => true,
    		'view' => view('admin.device.filter.add')->render(),
    	]);
    }

    public function store(Request $request)
    {
    	$filterdevice = DeviceFilter::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.device.filter.add', compact('filterdevice'))->render(),
    	]);
    }

    public function edit(DeviceFilter $filterdevice)
    {	
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование фильтра оборудования',
    		'view' => view('admin.device.filter.add', compact('filterdevice'))->render(),
    	]);
    }

    public function update(Request $request, DeviceFilter $filterdevice)
    {
    	$filterdevice->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.device.filter.add', compact('filterdevice'))->render(),
    	]);
    }

    public function delete(DeviceFilter $filterdevice)
    {

    }
}
