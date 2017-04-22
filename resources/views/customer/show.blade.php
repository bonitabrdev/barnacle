@extends('layouts.simple.panel')

@section('panel_heading', 'Customer Information')

@section('panel_body')
<p><strong>Customer ID:</strong> {{ $customer->id }}</p>
<ul>
    <li><strong>First Name:</strong> {{ $customer->first_name }}</li>
    <li><strong>Last Name:</strong> {{ $customer->last_name }}</li>
    <li><strong>Date of Birth:</strong> {{ $customer->dob }}</li>
    <li><strong>Phone Number:</strong> {{ $customer->phone }}</li>
    <li><strong>Home Street:</strong> {{ $customer->home_street }}</li>
    <li><strong>Home City:</strong> {{ $customer->home_city }}</li>
    <li><strong>Home State:</strong> {{ $customer->home_state }}</li>
    <li><strong>Home Zip:</strong> {{ $customer->home_zip }}</li>
    <li><strong>Local Street:</strong> {{ $customer->local_street }}</li>
    <li><strong>Local City:</strong> {{ $customer->local_city }}</li>
    <li><strong>Local State:</strong> {{ $customer->local_state }}</li>
    <li><strong>Local Zip:</strong> {{ $customer->local_zip }}</li>
    <li><strong>Drivers License:</strong> {{ $customer->drivers_license }}</li>
    <li><strong>E-mail Address:</strong> {{ $customer->email }}</li>
</ul>
@endsection
