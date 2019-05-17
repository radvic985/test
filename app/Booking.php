<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function getGuestsNumber($id)
    {
        return Booking::where('workshop_id', $id)->sum('guests_number');
    }
}
