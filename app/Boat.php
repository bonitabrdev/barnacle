<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    //

    public function reservation_slots()
    {
        return $this->hasMany('App\ReservationSlot');
    }
}
