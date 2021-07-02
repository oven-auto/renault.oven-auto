<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Property\PropertyRequest;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
    	$properties = Property::get();
    	return view('admin.property.index', compact('properties'));
    }

    public function create()
    {
    	return view('admin.property.add');
    }

    public function store(PropertyRequest $request)
    {
    	$property = Property::create($request->all());
    	return redirect()->route('properties.edit', $property)->with('message', 'Характеристика создана');
    }

    public function edit(Property $property)
    {
    	return view('admin.property.add', compact('property'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
    	$property->update($request->all());
    	return redirect()->route('properties.edit', $property)->with('message', 'Характеристика изменена');

    }

    public function show(Property $property)
    {
    	return redirect()->route('properties.edit', $property);
    }

    public function delete(Property $property)
    {

    }
}
