<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function presentation()
    {
    	return $this->hasOne(\App\Models\MarkPresentation::class,'mark_id')->withDefault();
    }

    public function properties()
    {
    	return $this->hasMany(\App\Models\MarkProperty::class);
    }

    public function document()
    {
    	return $this->hasOne(\App\Models\MarkDocument::class, 'mark_id')->withDefault();
    }

    public function colors()
    {
        return $this->hasmany(\App\Models\MarkColor::class)->with('color');
    }

}
