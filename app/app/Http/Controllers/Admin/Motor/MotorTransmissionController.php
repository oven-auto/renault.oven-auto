<?php

namespace App\Http\Controllers\Admin\Motor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Motor\MotorTransmissionRequest;
use App\Models\MotorTransmission;

class MotorTransmissionController extends Controller
{
    public function index()
    {
    	$transmissions = MotorTransmission::get();
    	return response()->json([
    		'title' => 'Список трансмиссий',
    		'success' => true,
    		'view' => view('admin.motor.transmission.index', compact('transmissions'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'title' => 'Добавить новую трансмиссию',
    		'success' => true,
    		'view' => view('admin.motor.transmission.add')->render(),
    	]);
    }

    public function store(MotorTransmissionRequest $request)
    {
    	$motortransmission = MotorTransmission::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.motor.transmission.add', compact('motortransmission'))->render(),
    	]);
    }

    public function edit(MotorTransmission $motortransmission)
    {	
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование трансмиссии',
    		'view' => view('admin.motor.transmission.add', compact('motortransmission'))->render(),
    	]);
    }

    public function update(MotorTransmissionRequest $request, MotorTransmission $motortransmission)
    {
    	$motortransmission->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.motor.transmission.add', compact('motortransmission'))->render(),
    	]);
    }

    public function delete(MotorTransmission $motortransmission)
    {

    }
}
