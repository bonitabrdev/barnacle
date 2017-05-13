<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Reservation extends Model
{
    //

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function getReservedDateAttribute($value)
    {
        $date = Carbon::parse($value);
        $date->hour = 0;
        $date->minute = 0;
        $date->second = 0;
        return $date;
    }

    public function setReservedDateAttribute($value)
    {
        $this->attributes['reserved_date'] = $value->toDateString();
    }

    public function getStartAttribute($value)
    {
        $time = Carbon::parse($value);
        $date = $this->reserved_date;
        $time->year = $date->year;
        $time->month = $date->month;
        $time->day = $date->day;
        return $time;
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value->toTimeString();
    }

    public function getEndAttribute($value)
    {
        $time = Carbon::parse($value);
        $date = $this->reserved_date;
        $time->year = $date->year;
        $time->month = $date->month;
        $time->day = $date->day;
        return $time;
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value->toTimeString();
    }

    public function scopeWithReservedDate($query, $date)
    {
        return $query->where('reserved_date', $date->toDateString());
    }
}
