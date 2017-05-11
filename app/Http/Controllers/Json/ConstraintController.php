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
            $responseData['date'] = $constraint->date->toDateString();
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
            '40HP' => intval($request->input('num_40hp')),
            '60HP' => intval($request->input('num_60hp'))
        ];

        $constraint = new Constraint;
        $constraint->date = $date;
        $constraint->start = $start;
        $constraint->end = $end;
        $constraint->data = $data;
        $constraint->save();

        $responseData['id'] = $constraint->id;

        return response()->json($responseData, 201);
    }

    public function storeRange(Request $request)
    {
        $responseData = [];

        $first = Carbon::parse($request->input('first'));
        $last = Carbon::parse($request->input('last'));
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));
        $data = [
            '40HP' => intval($request->input('num_40hp')),
            '60HP' => intval($request->input('num_60hp'))
        ];

        $constraints = Constraint::withDateRange($first, $last)->get();
        if ($constraints->isNotEmpty()) {
            $responseData['error'] = "One or more constraints already exist for the date range " . $first->toDateString() . " to " . $last->toDateString();

            return response()->json($responseData, 409);
        }

        $responseData['ids'] = [];

        for ($dt = $first->copy(); $dt->lte($last); $dt->addDay()) {
            $constraint = new Constraint;

            $constraint->date = $dt;
            $constraint->start = $start;
            $constraint->end = $end;
            $constraint->data = $data;

            $constraint->save();

            $responseData['ids'][] = $constraint->id;
        }

        return response()->json($responseData, 201);
    }

    public function getRange(Request $request, $first, $last)
    {
        $responseData = [];

        $first = Carbon::parse($first);
        $last = Carbon::parse($last);

        $responseData['first'] = $first->toDateString();
        $responseData['last'] = $last->toDateString();

        $constraints = Constraint::withDateRange($first, $last)->get();

        $responseData['count'] = $constraints->count();
        $responseData['constraints'] = [];

        foreach ($constraints as $constraint) {
            $responseData['constraints'][] = [
                'id' => $constraint->id,
                'date' => $constraint->date->toDateString(),
                'start' => $constraint->start->toTimeString(),
                'end' => $constraint->end->toTimeString(),
                'data' => $constraint->data
            ];
        }

        return response()->json($responseData);
    }
}
