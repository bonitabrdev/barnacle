<?php

namespace App\Http\Controllers\Json;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Reservation;
use App\ReservationRepository;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id',
            'reserved_date' => 'required|date_format:"Y-m-d"',
            'start' => 'required|date_format:"H:i:s"',
            'end' => 'required|date_format:"H:i:s"',
            'num_people' => 'required|numeric',
            'total_price' => 'required|numeric',
            'type' => 'required|in:40HP,60HP'
        ]);

        $reservation = new Reservation;

        $reservation->customer_id = $request->input('customer_id');
        $reservation->reserved_date = $request->input('reserved_date');
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');
        $reservation->num_people = $request->input('num_people');
        $reservation->total_price = $request->input('total_price');
        $reservation->type = $request->input('type');

        if (ReservationRepository::add($reservation)) {
            return $reservation;
        } else {
            return response()->json([
                'warnings' => [
                    'The reservation could not be added for the requested date and times.'
                ]
            ], 409);
        }
    }

    public function getTable(Request $request, $date)
    {
        return ReservationRepository::getTable($date);
    }
}
