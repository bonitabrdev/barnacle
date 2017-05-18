<?php

namespace App\Http\Controllers\Json;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name.last' => 'required',
            'phone' => 'required'
        ]);
    }

    public function old_store(Request $request)
    {
        $responseData = [];

        $customer = new Customer;

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->phone = $request->input('phone');
        $customer->dob = $request->input('dob');
        $customer->drivers_license = $request->input('drivers_license');
        $customer->email = $request->input('email');
        $customer->home_street = $request->input('home_street');
        $customer->home_city = $request->input('home_city');
        $customer->home_state = $request->input('home_state');
        $customer->home_zip = $request->input('home_zip');
        $customer->local_street = $request->input('local_street');
        $customer->local_city = $request->input('local_city');
        $customer->local_state = $request->input('local_state');
        $customer->local_zip = $request->input('local_zip');

        $customer->save();

        $responseData['id'] = $customer->id;

        return response()->json($responseData, 201);
    }
}
