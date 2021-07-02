<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Brand;
use App\Models\CountryProduction;
use App\Models\BodyWork;
use App\Models\Property;
use App\Repositories\MarkRepository;
use App\Models\Color;

class MarkController extends Controller
{
	public function __construct(MarkRepository $repository)
	{
		$this->repository = $repository;
	}

    public function index()
    {
    	$marks = Mark::with(['presentation'])->get();
    	return view('admin.mark.index', compact('marks'));
    }

    public function create()
    {
    	$brands = Brand::pluck('name','id');
    	$countries = CountryProduction::pluck('country','id');
    	$bodyworks = BodyWork::pluck('name','id');
    	$properties = Property::pluck('name','id');
    	return view('admin.mark.add', compact('brands','countries','bodyworks','properties'));
    }

    public function store(Request $request)
    {	
    	$mark = $this->repository->create($request->all());	
    	return redirect()->route('marks.edit',$mark)->with('message', 'Новая модель добавлена');
    }

    public function edit(Mark $mark)
    {
    	$brands = Brand::pluck('name','id');
    	$countries = CountryProduction::pluck('country','id');
    	$bodyworks = BodyWork::pluck('name','id');
    	$properties = Property::pluck('name','id');
     	return view('admin.mark.add', compact('brands','countries','bodyworks','properties', 'mark'));
    }

    public function update(Request $request, Mark $mark)
    {
    	$this->repository->update($mark, $request->all());
    	return redirect()->route('marks.edit',$mark)->with('message', 'Модель изменена');
    }

    public function show(Mark $mark)
    {
    	return redirect()->route('marks.edit',$mark);
    }

    public function delete(Mark $mark)
    {

    }

}
