<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function devices()
    {
    	return $this->belongsToMany(\App\Models\Device::class, 'option_devices');
    }

    public function marks()
    {
    	return $this->belongsToMany(\App\Models\Mark::class, 'option_marks');
    }
}
