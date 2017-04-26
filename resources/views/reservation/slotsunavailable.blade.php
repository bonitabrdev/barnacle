@extends('layouts.simple.panel')

@section('panel_heading', 'Error - Could Not Create Reservation')

@section('panel_body')
<p>The reservation could not be completed because one or more of the following slots was unavailable:</p>
<ul>
    @foreach($reserved_slots as $slot)
    <li><strong>Slot ID:</strong> {{ $slot }}</li>
    @endforeach
</ul>
@endsection
