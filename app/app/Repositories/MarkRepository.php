<?php

namespace App\Repositories;

use App\Models\Mark;
use Storage;

Class MarkRepository
{	
	private $markFields = [
		'name', 
		'prefix', 
		'brand_id', 
		'body_work_id', 
		'country_production_id', 
		'status',
	];

	private $presentationFields = [
		'slogan', 
		'text', 
		'icon', 
		'banner'
	];

	public function create(array $data) 
	{	
		$mark = Mark::create(array_intersect_key($data, array_flip($this->markFields)));
		$this->saveRelations($mark, $data);
		return $mark;
	}

	public function update(Mark $mark, array $data) : void
	{
		$mark->update(array_intersect_key($data, array_flip($this->markFields)));
		$this->saveRelations($mark, $data);
	}

	private function saveRelations(Mark $mark, array $data)
	{
		$this->savePresentation($mark, array_intersect_key($data, array_flip($this->presentationFields)));
		if(isset($data['properties']))
			$this->saveProperties($mark, $data['properties']);
		if(isset($data['documents']))
			$this->saveDocuments($mark, $data['documents']);
		if(isset($data['colors']))
			$this->saveColors($mark, $data['colors']);
	}

	private function savePresentation(Mark $mark, array $data) : void
	{
		$presentationData['icon'] = $mark->presentation->icon;
    	$presentationData['banner'] = $mark->presentation->banner;

		if(isset($data['icon'])) {
	    	$iconName = 'icon.'.$data['icon']->getClientOriginalExtension();
	        $presentationData['icon'] = $data['icon']
	        	->move(Storage::path('/public/mark/images/').$mark->slug.'/', $iconName)
	        	->getFilename();
	    }
        
        if(isset($data['banner'])) {
	        $bannerName = 'banner.'.$data['banner']->getClientOriginalExtension();
	        $presentationData['banner'] = $data['banner']
	        	->move(Storage::path('/public/mark/images/').$mark->slug.'/', $bannerName)
	        	->getFilename();
        }

    	$presentationData['slogan'] = $data['slogan'];
    	$presentationData['text'] = $data['text'];

    	$mark->presentation()->create($presentationData);
	}

	private function saveProperties(Mark $mark, array $data) : void
	{
		$mark->properties()->delete();
		foreach ($data as $property_id => $value) 
    		$mark->properties()->create([
    			'property_id' => $property_id,
    			'value' => $value
    		]);
	}

	public function saveDocuments(Mark $mark, array $data) : void
	{
		$array = [];
		foreach ($data as $key => $file) {
			$fileName = $key.'.'.$file->getClientOriginalExtension();
			$array[$key] = $file
				->move(Storage::path('/public/mark/documents/').$mark->slug.'/', $fileName)
        		->getFilename();
		}
		$mark->document()->create($array);
	}

	public function saveColors(Mark $mark, array $data) : void
	{
		$array = [];
		$ids = [];
		foreach ($data as $key => $colorData) {
			$ids[] = $key;
			if(isset($colorData['img'])) {
				$fileName = $key.'.'.$colorData['img']->getClientOriginalExtension();
				$colorData['img']->move(Storage::path('/public/mark/colors/').$mark->slug.'/', $fileName);
				if($mark->colors->contains('color_id', $key)) {
					$mark->colors->firstWhere('color_id', $key)->update([
						'img' => $fileName,
					]);
				} else {
					$mark->colors()->create([
						'color_id' => $key,
						'img' => $fileName,
					]);
				}
			}
		}
		$mark->colors()->whereNotIn('color_id',$ids)->delete();
	}

	public function getMarks($data = [])
	{
		$query = Mark::with('presentation');
		if(isset($data['brand_id']))
			$query->where('brand_id', $data['brand_id']);
		$marks = $query->get();
		return $marks;
	}
}