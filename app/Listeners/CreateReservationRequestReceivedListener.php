<?php

namespace App\Listeners;

use App\Events\CreateReservationRequestReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\CreateReservationRequest;
use App\Jobs\ProcessCreateReservationRequest;

class CreateReservationRequestReceivedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateReservationRequestReceived  $event
     * @return void
     */
    public function handle(CreateReservationRequestReceived $event)
    {
        $job = new ProcessCreateReservationRequest($event->createReservationRequest);
        dispatch($job);
    }
}
