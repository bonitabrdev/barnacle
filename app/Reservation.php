<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function reservation_slots()
    {
        return $this->hasMany('App\ReservationSlot');
    }
}
