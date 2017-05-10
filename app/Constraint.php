<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Constraint extends Model
{
    //

    public function getDateAttribute($value)
    {
        $date = Carbon::parse($value);
        $date->hour = 0;
        $date->minute = 0;
        $date->second = 0;
        return $date;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value->toDateString();
    }

    public function getStartAttribute($value)
    {
        $time = Carbon::parse($value);
        $date = $this->date;
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
        $date = $this->date;
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

    public function scopeWithDate($query, $date)
    {
        return $query->where('date', $date->toDateString());
    }

    public function scopeWithDateRange($query, $first, $last)
    {
        return $query->where('date', '>=', $first->toDateString())
            ->where('date', '<=', $last->toDateString());
    }
}
