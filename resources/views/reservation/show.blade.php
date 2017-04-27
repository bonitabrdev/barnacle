@extends('layouts.simple.panel')

@section('panel_heading', 'Reservation Information')

@section('panel_body')
<p><strong>Reservation ID:</strong> {{ $reservation->id }}</p>
<ul>
    <li><strong>Customer ID:</strong> {{ $reservation->customer_id }}</li>
    <li><strong>Number of People:</strong> {{ $reservation->num_people }}</li>
    <li><strong>Total Price:</strong> {{ $reservation->total_price }}</li>
    <li><strong>Date:</strong> {{ $reservation->reservation_slots->first()->reservation_date }}</li>
    <li><strong>Start Time:</strong> {{ $reservation->reservation_slots->sortBy('start_time')->first()->start_time }}</li>
    <li><strong>End Time:</strong> {{ $reservation->reservation_slots->sortBy('start_time')->last()->end_time }}</li>
    <li><strong>Hours:</strong> {{ ($reservation->reservation_slots->count() * 30) / 60 }}</li>
    <li><strong>Boat Name:</strong> {{ $reservation->reservation_slots->first()->boat->name }}</li>
    <li><strong>Boat Type:</strong> {{ $reservation->reservation_slots->first()->boat->type }}</li>
    <li>
        <strong>Customer Information:</strong>
        <ul>
            <li><strong>First Name:</strong> {{ $reservation->customer->first_name }}</li>
            <li><strong>Last Name:</strong> {{ $reservation->customer->last_name }}</li>
            <li><strong>Phone Number:</strong> {{ $reservation->customer->phone }}</li>
            <li><strong>Date of Birth:</strong> {{ $reservation->customer->dob }}</li>
            <li><strong>Home Street:</strong> {{ $reservation->customer->home_street }}</li>
            <li><strong>Home City:</strong> {{ $reservation->customer->home_city }}</li>
            <li><strong>Home State:</strong> {{ $reservation->customer->home_state }}</li>
            <li><strong>Home Zip:</strong> {{ $reservation->customer->home_zip }}</li>
            <li><strong>Local Street:</strong> {{ $reservation->customer->local_street }}</li>
            <li><strong>Local City:</strong> {{ $reservation->customer->local_city }}</li>
            <li><strong>Local State:</strong> {{ $reservation->customer->local_state }}</li>
            <li><strong>Local Zip:</strong> {{ $reservation->customer->local_zip }}</li>
            <li><strong>Drivers License:</strong> {{ $reservation->customer->drivers_license }}</li>
            <li><strong>E-mail Address:</strong> {{ $reservation->customer->email }}</li>
        </ul>
</ul>
@endsection
