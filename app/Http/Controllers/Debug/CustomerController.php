<?php

namespace App\Http\Controllers\Debug;

use App\Http\Controllers\Controller;

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
        return view('debug.customer.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer;

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->dob = $request->input('dob');
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

        return redirect()->route('debug.customer.show', ['id' => $customer->id]);
    }

    public function show(Request $request, $id)
    {
        $customer = NULL;

        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('debug.customer.notfound')->with('id', $id);
        }

        return view('debug.customer.show')->with('customer', $customer);
    }

    public function index(Request $request)
    {
        $customers =  Customer::all();

        return view('debug.customer.index')->with('customers', $customers);
    }

    public function edit(Request $request, $id)
    {
        $customer = NULL;

        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('debug.customer.notfound')->with('id', $id);
        }

        return view('debug.customer.edit')->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {
        $customer = NULL;

        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('debug.customer.notfound')->with('id', $id);
        }

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->dob = $request->input('dob');
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

        return redirect()->route('debug.customer.show', ['id' => $id]);
    }
}