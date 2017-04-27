<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationSlot extends Model
{
    //

    public function boat()
    {
        return $this->belongsTo('App\Boat');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
