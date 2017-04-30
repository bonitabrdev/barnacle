<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Carbon\Carbon;

use App\Constraint;

class ConstraintController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        return view('constraint.create');
    }

    public function store(Request $request)
    {
        $constraint = new Constraint;

        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        $date = Carbon::create($year, $month, $day, 0, 0, 0);
        $constraint->constrained_date = $date;

        $start_hour = $request->input('start_hour');
        $start_minute = $request->input('start_minute');
        $start_second = $request->input('start_second');
        $start = $date->copy();
        $start->hour = $start_hour;
        $start->minute = $start_minute;
        $start->second = $start_second;
        $constraint->start = $start;

        $end_hour = $request->input('end_hour');
        $end_minute = $request->input('end_minute');
        $end_second = $request->input('end_second');
        $end = $date->copy();
        $end->hour = $end_hour;
        $end->minute = $end_minute;
        $end->second = $end_second;
        $constraint->end = $end;

        $data = [];
        $data['40HP'] = intval($request->input('num_40hp'));
        $data['60HP'] = intval($request->input('num_60hp'));
        $constraint->data = $data;

        $constraint->save();

        return redirect()->route('constraint.show', ['id' => $constraint->id]);
    }

    public function show(Request $request, $id)
    {
        $constraint = NULL;

        try {
            $constraint = Constraint::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('constraint.notfound')->with('id', $id);
        }

        return view('constraint.show')->with('constraint', $constraint);
    }

    public function index(Request $request)
    {
        return redirect()->route('home');
    }

    public function edit(Request $request, $id)
    {
        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('home');
    }
}
