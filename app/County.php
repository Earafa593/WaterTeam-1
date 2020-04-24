<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class County extends Model
{
    //use SpatialTrait;

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function rivers()
    {
        return $this->belongsToMany('App\River');
    }
/*
    protected $fillable = [
        'name',
    ];

    protected $spatialFields = [
        'polygon',
    ];*/
}
