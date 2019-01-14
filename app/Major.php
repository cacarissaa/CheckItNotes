<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
    function university()
    {
        return $this->belongsTo(University::class);
    }

    function content()
    {
        return $this->hasMany(Content::class);
    }
}
