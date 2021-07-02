<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complectation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'brand_id',
    	'mark_id',
    	'motor_id',
    	'price',
    	'code',
    	'parent_id',
    	'sort',
    	'status'
    ];
}
