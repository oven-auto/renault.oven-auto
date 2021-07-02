<?php

namespace App\Http\Controllers\Admin\Option;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Brand;
use App\Models\Device;
use App\Repositories\DeviceRepository;

class OptionController extends Controller
{	
	private $repository;

	public function __construct(DeviceRepository $repository)
	{
		$this->repository = $repository;
	}

    public function index()
    {
    	$options = Option::get();
    	return view('admin.option.index', compact('options'));
    }

    public function create()
    {
    	$brands = Brand::pluck('name', 'id');

    	return view('admin.option.add', compact('brands'));
    }

    public function store(Request $request)
    {
    	$option = Option::create($request->except(['device_id', 'mark_id']));
    	$option->devices()->attach($request->get('device_id'));
    	$option->marks()->attach($request->get('mark_id'));

    	return redirect()->route('options.index');
    }

    public function edit(Option $option)
    {
    	$brands = Brand::pluck('name', 'id');
    	
    	$devices = $this->repository->getDevices(['brand_id' => $option->brand_id] );
    	
    	return view('admin.option.add', compact('brands', 'option', 'devices'));
    }

    public function update(Option $option, Request $request)
    {
    	$option->update($request->except(['device_id', 'mark_id']));
    	$option->devices()->sync($request->get('device_id'));
    	$option->marks()->sync($request->get('mark_id'));
    	return redirect()->route('options.index');
    }

    public function show(Option $option)
    {

    }

    public function delete(Option $option)
    {

    }
}
