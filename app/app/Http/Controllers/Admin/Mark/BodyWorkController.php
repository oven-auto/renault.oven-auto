<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BodyWork;

class BodyWorkController extends Controller
{
    public function index()
    {
    	$bodyworks = BodyWork::get();
    	return response()->json([
    		'title' => 'Список типов кузовов',
    		'success' => true,
    		'view' => view('admin.mark.bodywork.index', compact('bodyworks'))->render(),
    	]);
    }

    public function create()
    {
    	return response()->json([
    		'title' => 'Добавить новый тип кузова',
    		'success' => true,
    		'view' => view('admin.mark.bodywork.add')->render(),
    	]);
    }

    public function store(Request $request)
    {
    	$bodywork = BodyWork::create($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Добавление принято',
    		'view' => view('admin.mark.bodywork.add', compact('bodywork'))->render(),
    	]);
    }

    public function edit(BodyWork $bodywork)
    {	
    	return response()->json([
    		'success' => true,
    		'title' => 'Редактирование типа кузова',
    		'view' => view('admin.mark.bodywork.add', compact('bodywork'))->render(),
    	]);
    }

    public function update(Request $request, BodyWork $bodywork)
    {
    	$bodywork->update($request->all());
    	return response()->json([
    		'success' => true,
    		'title' => 'Изменение принято',
    		'view' => view('admin.mark.bodywork.add', compact('bodywork'))->render(),
    	]);
    }

    public function delete(BodyWork $bodywork)
    {

    }
}
