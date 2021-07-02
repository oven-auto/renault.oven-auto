<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function brand()
    {
    	return $this->hasOne(\App\Models\Brand::class, 'id', 'brand_id')->withDefault();
    }

    public function getWebCode() : Array 
    {
    	$result = explode('*', $this->web);
    	return $result;
    }

    public function getGradient()
    {
    	$colors = $this->getWebCode();

    	if(count($colors) > 1)
    	{
    		$procent = 100 / count($colors);
    		$str = 'linear-gradient( to top, '.implode(' '. $procent .'% , ', $colors).' '. $procent .'%)';
    	}
    	else
    		$str = implode(', ', $colors);

    	return $str;
    }
}
