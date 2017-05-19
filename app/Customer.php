<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function scopeWithPhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }
}
