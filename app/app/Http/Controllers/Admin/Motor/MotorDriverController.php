<?php

namespace App\Http\Controllers\Admin\Motor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Motor\MotorDriverRequest;
use App\Models\MotorDriver;

class MotorDriverController extends Controller
{
    public function index()
    {
    	$drivers = MotorDriver::get();
    	return response()->json([
    		'title' => 'Список типов привода',
    		'success' => true,
    		'view' => view('admin.motor.driver.index', compact('drivers'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'title' => 'Добавить новый тип привода',
    		'success' => true,
    		'view' => view('admin.motor.driver.add')->render(),
    	]);
    }

    public function store(MotorDriverRequest $request)
    {
    	$motordriver = MotorDriver::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.motor.driver.add', compact('motordriver'))->render(),
    	]);
    }

    public function edit(MotorDriver $motordriver)
    {	
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование типа привода',
    		'view' => view('admin.motor.driver.add', compact('motordriver'))->render(),
    	]);
    }

    public function update(MotorDriverRequest $request, MotorDriver $motordriver)
    {
    	$motordriver->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.motor.driver.add', compact('motordriver'))->render(),
    	]);
    }

    public function delete(MotorDriver $motordriver)
    {

    }
}
