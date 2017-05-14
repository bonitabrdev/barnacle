<?php

namespace App\Http\Controllers\Json;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\CreateReservationRequest;
use App\Events\CreateReservationRequestReceived;

class CreateReservationRequestController extends Controller
{
    public function __construct()
    {

    }

    public function store(Request $request)
    {
        $responseData = [];

        $crr = new CreateReservationRequest;

        $crr->customer_id = $request->input('customer_id');
        $crr->reserved_date = Carbon::parse($request->input('reserved_date'));
        $crr->start = Carbon::parse($request->input('start'));
        $crr->end = Carbon::parse($request->input('end'));
        $crr->num_people = $request->input('num_people');
        $crr->total_price = $request->input('total_price');
        $crr->type = $request->input('type');

        $crr->save();
        $responseData['id'] = $crr->id;

        event(new CreateReservationRequestReceived($crr));

        return response()->json($responseData, 201);
    }

    public function status(Request $request, $id)
    {
        $responseData = [];

        $crr = CreateReservationRequest::findOrFail($id);

        $responseData['processed'] = $crr->processed;
        if ($crr->processed) {
            $responseData['reservation_id'] = $crr->reservation_id;
        }

        return response()->json($responseData);
    }
}
