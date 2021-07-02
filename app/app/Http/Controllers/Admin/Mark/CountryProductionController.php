<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryProduction;

class CountryProductionController extends Controller
{
    public function index()
    {
    	$countryproductions = CountryProduction::get();
    	return response()->json([
    		'title' => 'Список стран производителей',
    		'success' => true,
    		'view' => view('admin.mark.countryproduction.index', compact('countryproductions'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'title' => 'Добавить новую страну производителя',
    		'success' => true,
    		'view' => view('admin.mark.countryproduction.add')->render(),
    	]);
    }

    public function store(Request $request)
    {
    	$countryproduction = CountryProduction::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.mark.countryproduction.add', compact('countryproduction'))->render(),
    	]);
    }

    public function edit(CountryProduction $countryproduction)
    {	
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование страны производителя',
    		'view' => view('admin.mark.countryproduction.add', compact('countryproduction'))->render(),
    	]);
    }

    public function update(Request $request, CountryProduction $countryproduction)
    {
    	$countryproduction->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.mark.countryproduction.add', compact('countryproduction'))->render(),
    	]);
    }

    public function delete(CountryProduction $countryproduction)
    {

    }
}
