@extends('layouts.simple.panel')

@section('panel_heading', 'Debug Dashboard')

@section('panel_body')
<p>Customer Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('debug.customer.create') }}">Create</a>
    <a class="btn btn-default" href="{{ route('debug.customer.index') }}">View All</a>
</p>
<p>Constraint Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('debug.constraint.create') }}">Create</a>
    <a class="btn btn-default" href="{{ route('debug.constraint.index') }}">View All</a>
</p>
<p>Reservation Management:</p>
    <a class="btn btn-default" href="{{ route('debug.reservation.create') }}">Create</a>
    <a class="btn btn-default" href="{{ route('debug.reservation.index') }}">View All</a>
</p>
@endsection
