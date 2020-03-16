<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function rivers()
    {
        return $this->belongsToMany('App\River');
    }
}
