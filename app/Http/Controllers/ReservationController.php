<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;

class ReservationController extends Controller
{
    public function __construct()
    {

    }

    public function create(Request $request)
    {
        return view('reservation.create.index');
    }

    public function showRequest(Request $request, $id)
    {
        return view('reservation.create.request')->with('id', $id);
    }

    public function show(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('reservation.show')->with('reservation', $reservation);
    }

    public function failed(Request $request)
    {
        return view('reservation.create.failed');
    }
}
