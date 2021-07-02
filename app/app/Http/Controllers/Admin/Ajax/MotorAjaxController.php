<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;

class MotorAjaxController extends Controller
{
    public function list(Request $request)
    {
        $query = Motor::with(['type','transmission','driver']);
        if($request->has('brand_id'))
            $query->where('brand_id', $request->get('brand_id'));
        $motors = $query->get();

        return response()->json([
            'success' => 1,
            'view' => view('admin.motor.modal.list', compact('motors'))->render(),
            'title' => 'Список моторов'
        ]);
    }
}
