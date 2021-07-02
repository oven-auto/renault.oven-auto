<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionAjaxController extends Controller
{
    public function list(Request $request)
    {
    	$query = Option::with('devices');
    	if($request->has('mark_id'))
    		$query->join('option_marks', 'option_marks.option_id', '=', 'options.id')
    			->where('option_marks.mark_id', $request->get('mark_id'));
    	$options = $query->get();

    	return response()->json([
    		'success' => 1,
    		'view' => view('admin.option.modal.list', compact('options'))->render(),
    	]);
    }
}
