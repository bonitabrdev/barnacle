<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Constraint extends Model
{
    //

    public function getConstrainedDateAttribute($value)
    {
        $date = Carbon::parse($value);
        $date->hour = 0;
        $date->minute = 0;
        $date->second = 0;
        return $date;
    }

    public function setConstrainedDateAttribute($value)
    {
        $this->attributes['constrained_date'] = $value->toDateString();
    }

    public function getStartAttribute($value)
    {
        $time = Carbon::parse($value);
        $date = $this->constrained_date;
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
        $date = $this->constrained_date;
        $time->year = $date->year;
        $time->month = $date->month;
        $time->day = $date->day;
        return $time;
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value->toTimeString();
    }

    public function getDataAttribute($value)
    {
        return json_decode($value, TRUE);
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }
}
