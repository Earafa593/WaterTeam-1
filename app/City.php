<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function county()
    {
        return $this->belongsTo('App\County');
    }

    public function rivers()
    {
        return $this->belongsToMany('App\River');
    }
}
