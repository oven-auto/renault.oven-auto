<?php

namespace App\Http\Controllers\Admin\Motor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\MotorType;
use App\Models\Brand;
use App\Models\MotorTransmission;
use App\Models\MotorDriver;

class MotorController extends Controller
{
    public function index()
    {   
    	$motors = Motor::with(['type','driver','transmission','brand'])->get();
    	return view('admin.motor.index', compact('motors'));
    }

    public function create()
    {
    	$types = MotorType::pluck('full_name', 'id');
    	$brands = Brand::pluck('name', 'id');
    	$transmissions = MotorTransmission::pluck('full_name', 'id');
    	$drivers = MotorDriver::pluck('full_name', 'id');

    	return view('admin.motor.add', compact('types', 'brands', 'transmissions', 'drivers'));
    }

    public function store(Request $request)
    {
        $motor = Motor::create($request->all());
        return redirect()->route('motors.edit',$motor)->with('message','Мотор создан');
    }

    public function show(Motor $motor)
    {
        return redirect()->route('motors.edit',$motor);
    }

    public function edit(Motor $motor)
    {
        $types = MotorType::pluck('full_name', 'id');
        $brands = Brand::pluck('name', 'id');
        $transmissions = MotorTransmission::pluck('full_name', 'id');
        $drivers = MotorDriver::pluck('full_name', 'id');

        return view('admin.motor.add', compact('types', 'brands', 'transmissions', 'drivers', 'motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $motor->update($request->all());
        return redirect()->route('motors.edit',$motor)->with('message','Мотор изменен');
    }

    public function delete(Motor $motor)
    {

    }
}
