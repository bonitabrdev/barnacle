<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //

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

    public function store(Request $request)
    {
        return redirect()->route('home');
    }

    public function show(Request $request, $id)
    {
        return redirect()->route('home');
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
