<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Customer;

class CustomerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer;

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->phone = $request->input('phone');
        $customer->home_street = $request->input('home_street');
        $customer->home_city = $request->input('home_city');
        $customer->home_state = $request->input('home_state');
        $customer->home_zip = $request->input('home_zip');
        $customer->local_street = $request->input('local_street');
        $customer->local_city = $request->input('local_city');
        $customer->local_state = $request->input('local_state');
        $customer->local_zip = $request->input('local_zip');
        $customer->drivers_license = $request->input('drivers_license');
        $customer->email = $request->input('email');

        $customer->save();

        return redirect()->route('customer.show', ['id' => $customer->id]);
    }

    public function show(Request $request, $id)
    {
        $customer = NULL;

        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('customer.notfound')->with('id', $id);
        }

        return view('customer.show')->with('customer', $customer);
    }
}
