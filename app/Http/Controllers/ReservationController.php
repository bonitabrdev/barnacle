<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Customer;
use App\Reservation;
use App\ReservationSlot;
use App\ReservationSlotsManager;

class ReservationController extends Controller
{
    //

    protected $reservation_slots_manager;

    public function __construct(ReservationSlotsManager $reservation_slots_manager)
    {
        $this->middleware('auth');

        $this->reservation_slots_manager = $reservation_slots_manager;
    }

    public function index(Request $request)
    {
        return redirect()->route('home');
    }

    public function create(Request $request)
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        // get the reserved slots, make into an array of slot ids
        $reserved_slots = $request->input('reserved_slots');
        $reserved_slots = explode(',', $reserved_slots);

        // try to mark the slots as unavailable only if they are
        // currently available
        $result = DB::transaction(function () use ($reserved_slots) {
            $slots = ReservationSlot::whereIn('id', $reserved_slots)->lockForUpdate()->get();
            // check that each slot is available
            foreach ($slots as $slot) {
                if ($slot->available == FALSE) {
                    return FALSE;
                }
            }
            // now that all slots have been confirmed as available, mark them all
            // as unavailable
            foreach ($slots as $slot) {
                $slot->available = FALSE;
                $slot->save();
            }
            return TRUE;
        });
        // if we failed because one or more of the reserved slots were unavailable
        if ($result == FALSE) {
            return view ('reservation.slotsunavailable')->with('reserved_slots', $reserved_slots);
        }

        // we have now confirmed the requested slots were available, and we have
        // marked them as unavailable thereby reserving them for our own use
        // and now we can continue to make the customer, reservation and attach
        // the reservation to the requested reservation slots

        // make the customer
        $customer = new Customer;

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->dob = $request->input('dob');
        $customer->phone = $request->input('phone');
        $customer->home_street = $request->input('home_street');
        $customer->home_city = $request->input('home_city');
        $customer->home_state = $request->input('home_state');
        $customer->home_zip = $request->input('home_zip');
        $customer->local_street = $request->input('local_street');
        $customer->local_city = $request->input('local_city');
        $customer->local_state = $request->input('local_state');
        $customer->local_zip = $request->input('local_zip');
        $customer->drivers_license = $request->input('drivers_license');
        $customer->email = $request->input('email');

        $customer->save();

        // make the reservation
        $reservation = new Reservation;

        //$reservation->customer_id = $customer->id;
        $reservation->num_people = $request->input('num_people');
        $reservation->total_price = $request->input('total_price');

        //$reservation->save();
        $customer->reservations()->save($reservation);

        // attach the reservation to each reservation slot
        $slots = ReservationSlot::find($reserved_slots);

        foreach ($slots as $slot) {
            //$slot->reservation_id = $reservation->id;
            $slot->reservation()->associate($reservation);
            $slot->save();
        }

        return redirect()->route('reservation.show', ['id' => $reservation->id]);
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

    public function update(Request $request, $id)
    {
        return redirect()->route('home');
    }

    public function showByDate(Request $request, $year, $month, $day)
    {
        return redirect()->route('home');
    }

    public function edit(Request $request, $id)
    {
        return redirect()->route('home');
    }
}
