<?php

namespace App\Http\Controllers\Admin\Motor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Motor\MotorTypeRequest;
use App\Models\MotorType;

class MotorTypeController extends Controller
{
    public function index()
    {
    	$types = MotorType::get();
    	return response()->json([
    		'success' => true,
    		'title' => 'Список типов моторов',
    		'view' => view('admin.motor.type.index', compact('types'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавить новый тип мотора',
    		'view' => view('admin.motor.type.add')->render(),
    	]);
    }	

    public function store(MotorTypeRequest $request)
    {
    	$motortype = MotorType::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.motor.type.add', compact('motortype'))->render(),
    	]);
    }

    public function edit(MotorType $motortype)
    {
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование типа мотора',
    		'view' => view('admin.motor.type.add', compact('motortype'))->render(),
    	]);
    }

    public function update(MotorTypeRequest $request, MotorType $motortype)
    {
    	$motortype->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.motor.type.add', compact('motortype'))->render(),
    	]);
    }

    public function delete(MotorType $type)
    {

    }
}
