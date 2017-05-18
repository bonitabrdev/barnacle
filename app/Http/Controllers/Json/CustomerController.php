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
            'name.first' => 'nullable|alpha',
            'name.last' => 'required|alpha',
            'phone' => 'required|numeric',
            'dob' => 'nullable|date_format:Y-m-d',
            'driversLicense' => 'nullable|alpha_dash',
            'email' => 'nullable|email',
            'address.home.street' => 'required_with:address.home.city,address.home.state,address.home.zip,address.local.street,address.local.city,address.local.state,address.local.zip',
            'address.home.city' => 'required_with:address.home.street,address.home.state,address.home.zip,address.local.street,address.local.city,address.local.state,address.local.zip',
            'address.home.state' => 'required_with:address.home.street,address.home.city,address.home.zip,address.local.street,address.local.city,address.local.state,address.local.zip',
            'address.home.zip' => 'required_with:address.home.street,address.home.city,address.home.state,address.local.street,address.local.city,address.local.state,address.local.zip',
            'address.local.street' => 'required_with:address.local.city,address.local.state,address.local.zip,address.home.street,address.home.city,address.home.state,address.home.zip',
            'address.local.city' => 'required_with:address.local.street,address.local.state,address.local.zip,address.home.street,address.home.city,address.home.state,address.home.zip',
            'address.local.state' => 'required_with:address.local.street,address.local.city,address.local.zip,address.home.street,address.home.city,address.home.state,address.home.zip',
            'address.local.zip' => 'required_with:address.local.street,address.local.city,address.local.state,address.home.street,address.home.city,address.home.state,address.home.zip'
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
