<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MarkRepository;

class MarkAjaxController extends Controller
{

	public $repository;

	public function __construct(MarkRepository $repository)
	{
		$this->repository = $repository;
	}

    public function list(Request $request)
    {
    	$marks = $this->repository->getMarks($request->all());

    	return response()->json([
    		'title' => 'Список моделей',
    		'view' => view('admin.mark.modal.list', compact('marks'))->render(),
    		'success' => true
    	]);
    }
}
