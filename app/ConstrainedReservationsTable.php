<?php

namespace App;

use Carbon\Carbon;

use App\Reservation;

/**
 * ConstrainedReservationsTable
 *
 * A class to represent a table of reservations bounded by certain given
 * constraints.
 */
class ConstrainedReservationsTable
{
    protected $start;
    protected $end;
    protected $table;

    public function __construct(Carbon $start, Carbon $end, array $types)
    {
        $this->start = $start->copy();
        $this->end = $end->copy();

        $this->table = [];

        foreach ($types as $k => $v) {
            $this->table[$k] = [];
            for ($i = 0; $i < $v; $i++) {
                $this->table[$k][] = collect([]);
            }
        }
    }

    public function insert(Reservation $newReservation)
    {
        if ($newReservation->start->lt($this->start)) {
            return FALSE;
        }
        if ($newReservation->end->gt($this->end)) {
            return FALSE;
        }

        $type = $newReservation->type;

        foreach ($this->table[$type] as &$row) {
            if ($this->insertIntoRow($newReservation, $row)) {
                return TRUE;
            }
        }

        return FALSE;
    }

    protected function insertIntoRow(Reservation $newReservation, &$row)
    {
        if ($row->isNotEmpty()) {
            foreach ($row as $reservation) {
                // will the new reservation fit before the current reservation?
                if ($newReservation->end->lte($reservation->start)) {
                    break;
                }
                // will the new reservation fit after the current reservation?
                if ($newReservation->start->gte($reservation->end)) {
                    continue;
                } else {
                    return FALSE;
                }
            }
        }

        $row->push($newReservation);
        $row = $row->sortBy(function ($reservation, $key) {
            return $reservation->start->toTimeString();
        })->values();

        return TRUE;
    }
}
