<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\CreateReservationRequest;

class CreateReservationRequestReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $createReservationRequest;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CreateReservationRequest $createReservationRequest)
    {
        $this->createReservationRequest = $createReservationRequest;
    }
}
