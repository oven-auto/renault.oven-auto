<?php

namespace App\Observers;

use App\Models\Mark;
use Str;

class MarkObserver
{
    public function saving(Mark $mark)
    {
    	$mark->slug = Str::slug($mark->name);
    }
}
