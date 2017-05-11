<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {

    }

    public function create(Request $request)
    {
        return view('reservation.create');
    }
}
