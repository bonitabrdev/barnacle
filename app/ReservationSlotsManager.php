<?php

namespace App;

use Carbon\Carbon;

use App\Boat;
use App\ReservationSlot;

class ReservationSlotsManager
{

    protected $start_hour;
    protected $end_hour;
    protected $interval;

    public function __construct($start_hour, $end_hour, $interval)
    {
        $this->start_hour = $start_hour;
        $this->end_hour = $end_hour;
        $this->interval = $interval;
    }
}
