@extends('layouts.base')

@section('heading', 'View Reservation')

@section('body')
<div class="row">
    <div class="col-md-12">
        <h4>Customer Information</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>First Name:</strong> {{ $reservation->customer->first_name }}</p>
    </div>
    <div class="col-md-6">
        <p><strong>Last Name:</strong> {{ $reservation->customer->last_name }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>Phone Number:</strong> {{ $reservation->customer->phone }}</p>
    </div>
    <div class="col-md-5">
        <p><strong>Date of Birth:</strong> {{ $reservation->customer->dob }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>Drivers License:</strong> {{ $reservation->customer->drivers_license }}</p>
    </div>
    <div class="col-md-6">
        <p><strong>E-mail Address:</strong> {{ $reservation->customer->email }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>Home Address</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>Street:</strong> {{ $reservation->customer->home_street }}</p>
    </div>
    <div class="col-md-3">
        <p><strong>City:</strong> {{ $reservation->customer->home_city }}</p>
    </div>
    <div class="col-md-2">
        <p><strong>State:</strong> {{ $reservation->customer->home_state }}</p>
    </div>
    <div class="col-md-3">
        <p><strong>Zip Code:</strong> {{ $reservation->customer->home_zip }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>Local Address</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>Street:</strong> {{ $reservation->customer->local_street }}</p>
    </div>
    <div class="col-md-3">
        <p><strong>City:</strong> {{ $reservation->customer->local_city }}</p>
    </div>
    <div class="col-md-2">
        <p><strong>State:</strong> {{ $reservation->customer->local_state }}</p>
    </div>
    <div class="col-md-3">
        <p><strong>Zip Code:</strong> {{ $reservation->customer->local_zip }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Reservation Information</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>Reserved Date:</strong> {{ $reservation->reserved_date }}</p>
    </div>
    <div class="col-md-4">
        <p><strong>Start Time:</strong> {{ $reservation->start }}</p>
    </div>
    <div class="col-md-4">
        <p><strong>End Time:</strong> {{ $reservation->end }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p><strong>Number of People:</strong> {{ $reservation->num_people }}</p>
    </div>
    <div class="col-md-4">
        <p><strong>Boat Type:</strong> {{ $reservation->type }}</p>
    </div>
    <div class="col-md-4">
        <p><strong>Total Price:</strong> {{ $reservation->total_price }}</p>
    </div>
</div>
@endsection
