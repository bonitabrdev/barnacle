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
        $data = [];

        $date = Carbon::create($year, $month, $day, 0, 0, 0);
        $constraints = Constraint::withDate($date)->get();

        if ($constraints->isEmpty()) {
            $data['error'] = "No constraint found for date: " . $date->toDateString();
            return response()->json($data, 404);
        } else {
            $constraint = $constraints->first();
            $data['id'] = $constraint->id;
            $data['constrained_date'] = $constraint->constrained_date->toDateString();
            $data['start'] = $constraint->start->toTimeString();
            $data['end'] = $constraint->end->toTimeString();
            $data['data'] = $constraint->data;
            return response()->json($data, 200);
        }
    }
}
