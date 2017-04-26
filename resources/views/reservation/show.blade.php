@extends('layouts.simple.panel')

@section('panel_heading', 'Reservation Information')

@section('panel_body')
<p><strong>Reservation ID:</strong> {{ $reservation->id }}</p>
<ul>
    <li><strong>Customer ID:</strong> {{ $reservation->customer_id }}</li>
    <li><strong>Number of People:</strong> {{ $reservation->num_people }}</li>
    <li><strong>Total Price:</strong> {{ $reservation->total_price }}</li>
</ul>
@endsection
