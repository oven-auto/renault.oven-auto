<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Brand;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::with('brand')->get();
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        $brands = Brand::pluck('name','id');
        return view('admin.color.add', compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'code', 'brand_id']);
        $data['web'] = implode('*', $request->web);
        $color = Color::create($data);
        return redirect()->route('colors.edit', $color)->with('message', 'Цвет добавлен');
    }

    public function edit(Request $request, Color $color)
    {
        $brands = Brand::pluck('name','id');
        return view('admin.color.add', compact('brands', 'color'));
    }

    public function update(Request $request, Color $color)
    {
        $data = $request->only(['name', 'code', 'brand_id']);
        $data['web'] = implode('*', $request->web);
        $color->update($data);
        return redirect()->route('colors.edit', $color)->with('message', 'Цвет изменен');
    }

    public function show(Color $color)
    {

    }

    public function delete(Color $color)
    {
    	
    }
}
