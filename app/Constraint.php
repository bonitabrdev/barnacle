<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Constraint extends Model
{
    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'reserved_date', 'date');
    }

    public function setDateAttribute($value)
    {
        if ($value instanceof Carbon) {
            $value = $value->toDateString();
        }

        $this->attributes['date'] = $value;
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

    public function getDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }

    public function scopeWithDate($query, $date)
    {
        if ($date instanceof Carbon) {
            $date = $date->toDateString();
        }

        return $query->where('date', $date);
    }

    public function scopeWithDateRange($query, $first, $last)
    {
        if ($first instanceof Carbon) {
            $first = $first->toDateString();
        }
        if ($last instanceof Carbon) {
            $last = $last->toDateString();
        }

        return $query->where('date', '>=', $first)
            ->where('date', '<=', $last);
    }
}
