<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Customer;
use App\Reservation;

class ReservationController extends Controller
{
    //

    protected $reservation_slots_manager;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return redirect()->route('home');
    }

    public function create(Request $request)
    {
        return view('reservation.create');
    }

    public function show(Request $request, $id)
    {
        $reservation = NULL;

        try {
            $reservation = Reservation::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('reservation.notfound')->with('id', $id);
        }

        return view('reservation.show')->with('reservation', $reservation);
    }

    public function edit(Request $request, $id)
    {
        return redirect()->route('home');
    }
}
