@extends('layouts.simple.panel')

@section('panel_heading', 'Dashboard')

@section('panel_body')
<p>You are logged in!</p>
<p>Cutomer Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('customer.create') }}">Create</a>
    <a class="btn btn-default" href="{{ route('customer.index') }}">View All</a>
</p>
<p>Boat Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('boat.create') }}">Create</a>
</p>
<p>Reservation Slots Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('reservation_slots.make.show') }}">Make Slots</a>
    <a class="btn btn-default" href="{{ route('reservation_slots.index') }}">View Slots</a>
</p>
@endsection
