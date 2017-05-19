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
            'first_name' => 'nullable|alpha',
            'last_name' => 'required|alpha',
            'phone' => 'required|numeric',
            'dob' => 'nullable|date_format:Y-m-d',
            'drivers_license' => 'nullable|alpha_dash',
            'email' => 'nullable|email',
            'home_street' => 'required_with:home_city,home_state,home_zip,local_street,local_city,local_state,local_zip',
            'home_city' => 'required_with:home_street,home_state,home_zip,local_street,local_city,local_state,local_zip',
            'home_state' => 'required_with:home_street,home_city,home_zip,local_street,local_city,local_state,local_zip',
            'home_zip' => 'required_with:home_street,home_city,home_state,local_street,local_city,local_state,local_zip',
            'local_street' => 'required_with:local_city,local_state,local_zip,home_street,home_city,home_state,home_zip',
            'local_city' => 'required_with:local_street,local_state,local_zip,home_street,home_city,home_state,home_zip',
            'local_state' => 'required_with:local_street,local_city,local_zip,home_street,home_city,home_state,home_zip',
            'local_zip' => 'required_with:local_street,local_city,local_state,home_street,home_city,home_state,home_zip'
        ]);
    }

    public function findByPhone(Request $request, $phone)
    {
        $customers = Customer::withPhone($phone)->get();

        return $customers;
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
