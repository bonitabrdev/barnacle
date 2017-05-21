<?php

namespace App;

use App\Constraint;
use App\Reservation;
use App\ConstrainedReservationsTable;
use Illuminate\Support\Facades\DB;

class ReservationRepository
{
    public static function add(Reservation $newReservation)
    {
        return DB::transaction(function () use ($newReservation) {
            $constraint = $newReservation->constraint()->lockForUpdate()->get()->first();
            $table = new ConstrainedReservationsTable($constraint);

            foreach ($constraint->reservations as $reservation) {
                $table->insert($reservation);
            }

            if ($table->insert($newReservation)) {
                $newReservation->save();
                return true;
            } else {
                return false;
            }
        });
    }
}
