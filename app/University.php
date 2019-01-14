<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    function major()
    {
        return $this->hasMany(Major::class);
    }
}
