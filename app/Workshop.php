<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function getWorkshops()
    {
        return Workshop::all()->toArray();
    }

    public static function getSpot($id)
    {
        return Workshop::find($id, ['slot']);
    }
}
