<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class River extends Model
{
    public function cities()
    {
        return $this->belongsToMany('App\City');
    }

    public function counties()
    {
        return $this->belongsToMany('App\County');
    }
}
