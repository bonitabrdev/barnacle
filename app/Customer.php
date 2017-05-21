<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function setDobAttribute($value)
    {
        if ($value instanceof Carbon) {
            $value = $value->toDateString();
        }

        $this->attributes['dob'] = $value;
    }

    public function scopeWithPhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }
}
