<?php

namespace App\Http\Controllers\Admin\Device;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Brand;
use App\Models\DeviceType;
use App\Models\DeviceFilter;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::with(['type','filter','brands'])->get();
        return view('admin.device.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::pluck('name','id');
        $types = DeviceType::pluck('name','id');
        $filters = DeviceFilter::pluck('name','id');
        return view('admin.device.add', compact('brands','types','filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = Device::create($request->except('brand_ids'));
        $device->brands()->attach($request->get('brand_ids'));
        return redirect()->route('devices.edit', $device)->with('message', 'Новое оборудование создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return redirect()->route('devices.edit', $device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $brands = Brand::pluck('name','id');
        $types = DeviceType::pluck('name','id');
        $filters = DeviceFilter::pluck('name','id');
        return view('admin.device.add', compact('device','brands','types','filters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $device->update($request->except('brand_ids'));
        $device->brands()->detach();
        $device->brands()->attach($request->get('brand_ids'));
        return redirect()->route('devices.edit', $device)->with('message', 'Оборудование изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
