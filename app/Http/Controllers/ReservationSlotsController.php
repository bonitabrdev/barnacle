<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationSlotsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMakeSlotsForDay(Request $request)
    {
        return redirect()->route('home');
    }

    public function doMakeSlotsForDay(Request $request)
    {
        return redirect()->route('home');
    }

    public function showSlotsForDay(Request $request, $year, $month, $day)
    {
        return redirect()->route('home');
    }

    public function index(Request $request)
    {
        return redirect()->route('home');
    }
}
