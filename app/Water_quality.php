<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water_quality extends Model
{
    public function rivers()
    {
        return $this->hasMany('App\River');
    }
}
