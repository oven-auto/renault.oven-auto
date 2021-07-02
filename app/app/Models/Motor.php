<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
    	return $this->belongsTo(\App\Models\MotorType::class, 'motor_type_id')->withDefault();
    }

    public function transmission()
    {
    	return $this->belongsTo(\App\Models\MotorTransmission::class, 'motor_transmission_id')->withDefault();
    }

    public function driver()
    {
    	return $this->belongsTo(\App\Models\MotorDriver::class, 'motor_driver_id')->withDefault();
    }

    public function brand()
    {
    	return $this->belongsTo(\App\Models\Brand::class)->withDefault();
    }

    public function getFullNameAttribute()
    {
        $mas[] = $this->brand->name;
        $mas[] = $this->name;
        $mas[] = $this->type->name;
        $mas[] = $this->size;
        $mas[] = '('.$this->power.'л.с.)';
        $mas[] = $this->transmission->small_name;
        $mas[] = $this->driver->small_name;
        return implode(' ',$mas);
    }
}
