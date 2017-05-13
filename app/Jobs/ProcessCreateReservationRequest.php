<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

use App\CreateReservationRequest;
use App\Reservation;
use App\ConstrainedReservationsTable;
use App\Constraint;

class ProcessCreateReservationRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $createReservationRequest;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CreateReservationRequest $createReservationRequest)
    {
        $this->createReservationRequest = $createReservationRequest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {
            $date = $this->createReservationRequest->reserved_date;
            $constraint = Constraint::withDate($date)->lockForUpdate()->get()->first();

            $reservations = Reservation::withReservedDate($date)->get();
            $table = new ConstrainedReservationsTable($constraint->start, $constraint->end, $constraint->data);
            foreach ($reservations as $existingReservation) {
                $table->insert($existingReservation);
            }

            $reservation = new Reservation;
            $reservation->reserved_date = $this->createReservationRequest->reserved_date;
            $reservation->customer_id = $this->createReservationRequest->customer_id;
            $reservation->num_people = $this->createReservationRequest->num_people;
            $reservation->total_price = $this->createReservationRequest->total_price;
            $reservation->start = $this->createReservationRequest->start;
            $reservation->end = $this->createReservationRequest->end;
            $reservation->type = $this->createReservationRequest->type;

            if ($table->insert($reservation)) {
                $reservation->save();
                $this->createReservationRequest->reservation_id = $reservation->id;
            }

            $this->createReservationRequest->processed = TRUE;
            $this->createReservationRequest->save();
        });
    }
}
