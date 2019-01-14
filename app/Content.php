<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    function major()
    {
        return $this->belongsTo(Major::class);
    }
}
