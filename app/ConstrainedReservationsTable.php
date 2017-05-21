<?php

namespace App;

use Carbon\Carbon;

use App\Reservation;
use App\Constraint;

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

    public function __construct(Constraint $constraint)
    {
        $this->start = $constraint->start;
        $this->end = $constraint->end;

        $types = $constraint->data;

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
        if ($newReservation->start < $this->start) {
            return false;
        }
        if ($newReservation->end > $this->end) {
            return false;
        }

        $type = $newReservation->type;

        foreach ($this->table[$type] as &$row) {
            if ($this->insertIntoRow($newReservation, $row)) {
                return true;
            }
        }

        return false;
    }

    protected function insertIntoRow(Reservation $newReservation, &$row)
    {
        if ($row->isNotEmpty()) {
            foreach ($row as $reservation) {
                // will the new reservation fit before the current reservation?
                if ($newReservation->end <= $reservation->start) {
                    break;
                }
                // will the new reservation fit after the current reservation?
                if ($newReservation->start >= $reservation->end) {
                    continue;
                } else {
                    return false;
                }
            }
        }

        $row->push($newReservation);
        $row = $row->sortBy(function ($reservation, $key) {
            return $reservation->start;
        })->values();

        return true;
    }
}
