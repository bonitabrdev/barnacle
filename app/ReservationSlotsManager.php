<?php

namespace App;

use Carbon\Carbon;

use App\Boat;
use App\ReservationSlot;

use Illuminate\Support\Facades\DB;

/**
 * ReservationsSlotsManager
 *
 * A class to encapsulate all business logic as it pertains to reservation
 * slots.
 */
class ReservationSlotsManager
{
    /**
     * The hour at which the slots for a given date and boat should start. It
     * is the start_hour for the first slot for a given date and boat.
     *
     * @var int
     */
    protected $start_hour;
    /**
     * The hour at which the slots for a given date and boat should end. It is
     * the end_hour for the last slot for a given date and boat.
     *
     * @var int
     */
    protected $end_hour;
    /**
     * The number of minutes which each slot covers. For any given slot
     * interval = end_time - start_time for that slot.
     *
     * @var int
     */
    protected $interval;

    /**
     * Construct a new instance of ReservationSlotsManager.
     *
     * @param int $start_hour
     * @param int $end_hour
     * @param int $interval
     * @return void
     */
    public function __construct($start_hour, $end_hour, $interval)
    {
        $this->start_hour = $start_hour;
        $this->end_hour = $end_hour;
        $this->interval = $interval;
    }

    /**
     * Make all the reservation slots for all boats for a given date. First
     * checks to see if any slots already exist for the given date, and if so
     * does nothing.
     *
     * @param Carbon\Carbon $date
     * @return void
     */
    public function makeSlots(Carbon $date)
    {
        // check to see if the date has any slots already
        if ($this->hasSlots($date)) {
            return;
        }

        // get all boats
        $boats = Boat::all();
        foreach ($boats as $boat) {
            // make slots for each boat
            $this->makeSlotsForBoat($date, $boat);
        }
    }

    /**
     * Makes all the reservation slots for a given date and a given boat. First
     * checks to see if any slots already exist for the given date and the
     * given boat, and if so does nothing.
     *
     * @param Carbon\Carbon $date
     * @param App\Boat $boat
     * @return void
     */
    public function makeSlotsForBoat(Carbon $date, Boat $boat)
    {
        // check to see if we already have slots for this boat
        if ($this->hasSlotsForBoat($date, $boat)) {
            return;
        }

        $start_dt = Carbon::create($date->year, $date->month, $date->day, $this->start_hour, 0, 0);
        $end_dt = Carbon::create($date->year, $date->month, $date->day, $this->end_hour, 0, 0);

        for ($dt = $start_dt->copy(); $dt->lt($end_dt); $dt->addMinutes($this->interval)) {
            $slot = new ReservationSlot;

            $slot->reservation_id = NULL;
            $slot->reservation_date = $dt->copy();
            $slot->start_time = $dt->copy();
            $slot->end_time = $dt->copy()->addMinutes($this->interval);
            $slot->available = TRUE;

            $boat->reservation_slots()->save($slot);
        }
    }

    /**
     * Checks to see if any reservation slots exist for a given date. If so it
     * returns TRUE, otherwise it returns FALSE.
     *
     * @param Carbon\Carbon $date
     * @return bool
     */
    public function hasSlots(Carbon $date)
    {
        $slots = ReservationSlot::where('reservation_date', $date->toDateString())->get();

        return $slots->isNotEmpty();
    }

    /**
     * Checks to see if any reservation slots exist for a given date and given
     * boat. If so it returns TRUE, otherwise it returns FALSE.
     *
     * @param Carbon\Carbon $date
     * @param App\Boat $boat
     * @return bool
     */
    public function hasSlotsForBoat(Carbon $date, Boat $boat)
    {
        $slots = $boat->reservation_slots()->where('reservation_date', $date->toDateString())->get();

        return $slots->isNotEmpty();
    }

    /**
     * Returns an array of dates (Carbon objects) which currently have
     * reservation slots allocated.
     *
     * @return array
     */
    public function getDatesHavingSlots()
    {
        $results = DB::table('reservation_slots')
            ->select('reservation_date')
            ->distinct()
            ->orderBy('reservation_date', 'asc')
            ->get();

        $dates = [];
        foreach ($results as $result) {
            $dates[] = Carbon::parse($result->reservation_date);
        }

        return $dates;
    }

    /**
     * Get an array of slots for the given date and given boat
     *
     * @param Carbon\Carbon $date
     * @param App\Boat $boat
     * @return array
     */
    public function getSlots(Carbon $date, Boat $boat)
    {
        $slots = $boat->reservation_slots()->where('reservation_date', $date->toDateString())->get();

        return $slots->sortBy('start_time')->values()->all();
    }
}
