<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Option;

class ColorAjaxController extends Controller
{
    public function palette(Request $request)
    {
    	$query = Color::query();
    	if($request->has('brand_id'))
    		$query->where('brand_id', $request->get('brand_id'));
    	$colors = $query->get();

        

    	return response()->json([
    		'title' => 'Палитра цветов',
    		'view' => view('admin.color.color_cells', compact('colors'))->render(),
    		'success' => true
    	]);
    }

    public function list(Request $request)
    {
        $query = Color::query();
        if($request->has('mark_id'))
            $query->join('mark_colors', 'mark_colors.color_id', '=', 'colors.id')
                ->where('mark_colors.mark_id', $request->get('mark_id'));
        $colors = $query->get();

        $options = Option::where('colored', 1)->pluck('name','id');
        
        return response()->json([
            'title' => 'Палитра цветов',
            'view' => view('admin.color.modal.list', compact('colors','options'))->render(),
            'success' => true
        ]);
    }
}
