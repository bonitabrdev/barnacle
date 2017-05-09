<?php

namespace App\Http\Controllers\Json;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Constraint;

class ConstraintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getByDate(Request $request, $year, $month, $day)
    {
        $responseData = [];

        $date = Carbon::create($year, $month, $day, 0, 0, 0);
        $constraints = Constraint::withDate($date)->get();

        if ($constraints->isEmpty()) {
            $responseData['error'] = "No constraint found for date: " . $date->toDateString();
            return response()->json($responseData, 404);
        } else {
            $constraint = $constraints->first();
            $responseData['id'] = $constraint->id;
            $responseData['constrained_date'] = $constraint->constrained_date->toDateString();
            $responseData['start'] = $constraint->start->toTimeString();
            $responseData['end'] = $constraint->end->toTimeString();
            $responseData['data'] = $constraint->data;
            return response()->json($responseData, 200);
        }
    }

    public function store(Request $request)
    {
        $responseData = [];

        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        $date = Carbon::create($year, $month, $day, 0, 0, 0);

        $constraints = Constraint::withDate($date)->get();
        if ($constraints->isNotEmpty()) {
            $responseData['error'] = "Constraint already exists for date: " . $date->toDateString();
            return response()->json($responseData, 409);
        }

        $start = $date->copy();
        $start->hour = $request->input('start_hour');
        $start->minute = $request->input('start_minute');
        $start->second = $request->input('start_second');

        $end = $date->copy();
        $end->hour = $request->input('end_hour');
        $end->minute = $request->input('end_minute');
        $end->second = $request->input('end_second');

        $data = [
            '40HP' => $request->input('num_40hp'),
            '60HP' => $request->input('num_60hp')
        ];

        $constraint = new Constraint;
        $constraint->constrained_date = $date;
        $constraint->start = $start;
        $constraint->end = $end;
        $constraint->data = $data;
        $constraint->save();

        $responseData['id'] = $constraint->id;

        return response()->json($responseData, 201);
    }
}
