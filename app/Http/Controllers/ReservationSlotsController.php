<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\ReservationSlot;
use App\Boat;

class ReservationSlotsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMakeSlotsForDay(Request $request)
    {
        return view('reservation_slots.make_slots_for_day');
    }

    public function doMakeSlotsForDay(Request $request)
    {
        // should add a check up here to make sure duplicate slots are not
        // made for any given day
        $start_hour = 8;
        $end_hour = 18;
        $slot_minutes = 30;

        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');

        $end_dt = Carbon::create($year, $month, $day, $end_hour, 0, 0);

        $boats = Boat::all();
        foreach ($boats as $boat) {
            for (
                $dt = Carbon::create($year, $month, $day, $start_hour, 0, 0);
                $dt->lt($end_dt);
                $dt->addMinutes($slot_minutes)
            ) {
                $slot = new ReservationSlot;

                $slot->boat_id = $boat->id;
                $slot->reservation_id = NULL;
                $slot->reservation_date = $dt->copy();
                $slot->start_time = $dt->copy();
                $slot->end_time = $dt->copy()->addMinutes($slot_minutes);
                $slot->available = TRUE;

                $slot->save();
            }
        }

        return redirect()->route('reservation_slots.showforday', ['year' => $year, 'month' => $month, 'day' => $day]);
    }

    public function showSlotsForDay(Request $request, $year, $month, $day)
    {
        $dt = Carbon::create($year, $month, $day);
        $slots = ReservationSlot::where('reservation_date', $dt->toDateString())->get();
        return
            view('reservation_slots.show_slots_for_day')
                ->with('year', $year)
                ->with('month', $month)
                ->with('day', $day)
                ->with('slots', $slots);
    }

    public function index(Request $request)
    {
        $slot_dates_results = DB::table('reservation_slots')
            ->select('reservation_date')
            ->distinct()
            ->get();
        $slot_dates = [];
        foreach ($slot_dates_results as $slot_date_result) {
            $slot_dates[] = Carbon::parse($slot_date_result->reservation_date);
        }

        return view('reservation_slots.index')->with('slot_dates', $slot_dates);
    }
}
