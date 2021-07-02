<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandAjaxController extends Controller
{
    public function list()
    {
        $brands = Brand::get();

        return response()->json([
            'success' => 1,
            'view' => view('admin.brand.modal.list', compact('brands'))->render(),
            'title' => 'Список брендов'
        ]);
    }
}
