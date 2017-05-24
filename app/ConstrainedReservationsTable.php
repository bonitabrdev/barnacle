<?php

namespace App;

use Carbon\Carbon;

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

    protected function buildFreeSlot($start, $end)
    {
        $minutes = Carbon::parse($start)->diffInMinutes(Carbon::parse($end));

        return [
            'start' => $start,
            'end' => $end,
            'minutes' => $minutes,
            'reservation' => null
        ];
    }

    protected function buildSlot(Reservation $reservation)
    {
        $slot = $this->buildFreeSlot($reservation->start, $reservation->end);
        $slot['reservation'] = $reservation;
        // load the customer relationship, cuz we will need it
        $reservation->load('customer');

        return $slot;
    }

    protected function buildTableRow($row)
    {
        $tableRow = collect([]);

        // push a free slot of 0 minutes to get started
        $tableRow->push($this->buildFreeSlot($this->start, $this->start));

        foreach ($row as $reservation) {
            // do we need to place a free slot between this and the last slot?
            $last = $tableRow->last();
            if ($reservation->start > $last['end']) {
                $slot = $this->buildFreeSlot($last['end'], $reservation->start);
                $tableRow->push($slot);
            }

            // build a slot for the reservation and push it
            $slot = $this->buildSlot($reservation);
            $tableRow->push($slot);
        }

        // do we need to append a final free slot to the end?
        $last = $tableRow->last();
        if ($last['end'] < $this->end) {
            $slot = $this->buildFreeSlot($last['end'], $this->end);
            $tableRow->push($slot);
        }

        // shift and get rid of that first slot we pushed
        $tableRow->shift();

        $minutes = Carbon::parse($this->start)->diffInMinutes(Carbon::parse($this->end));

        return [
            'minutes' => $minutes,
            'slots' => $tableRow
        ];
    }

    public function buildTable()
    {
        $table = [];

        foreach ($this->table as $k => $v) {
            $table[$k] = [];
            foreach ($v as $row) {
                $table[$k][] = $this->buildTableRow($row);
            }
        }

        return $table;
    }
}
