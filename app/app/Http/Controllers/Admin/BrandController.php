<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Admin\Brand\BrandCreateRequest;

class BrandController extends Controller
{
    public function index()
    {
    	$brands = Brand::get();
    	return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
    	return view('admin.brand.add');
    }

    public function store(BrandCreateRequest $request)
    {
    	$brand = Brand::create($request->only('name'));
    	return redirect()
    		->route('brands.show', $brand)
    		->with('message', 'Новый бренд создан');
    }

    public function show(Brand $brand)
    {
    	return view('admin.brand.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
    	return view('admin.brand.add', compact('brand'));
    }

    public function update(BrandCreateRequest $request, Brand $brand)
    {
    	$brand->update($request->only('name'));
    	return redirect()
    		->route('brands.show', $brand)
    		->with('message', 'Бренд изменен');
    }

    public function delete(Brand $brand)
    {

    }
}
