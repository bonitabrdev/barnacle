<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function constraint()
    {
        return $this->belongsTo('App\Constraint', 'reserved_date', 'date');
    }

    public function setReservedDateAttribute($value)
    {
        if ($value instanceof Carbon) {
            $value = $value->toDateString();
        }

        $this->attributes['reserved_date'] = $value;
    }

    public function setStartAttribute($value)
    {
        if ($value instanceof Carbon) {
            $value = $value->toTimeString();
        }

        $this->attributes['start'] = $value;
    }

    public function setEndAttribute($value)
    {
        if ($value instanceof Carbon) {
            $value = $value->toTimeString();
        }

        $this->attributes['end'] = $value;
    }

    public function scopeWithReservedDate($query, $date)
    {
        if ($date instanceof Carbon) {
            $date = $date->toDateString();
        }

        return $query->where('reserved_date', $date);
    }
}
