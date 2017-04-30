@extends('layouts.simple.panel')

@section('panel_heading', 'Dashboard')

@section('panel_body')
<p>You are logged in!</p>
<p>Cutomer Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('customer.create') }}">Create</a>
    <a class="btn btn-default" href="{{ route('customer.index') }}">View All</a>
</p>
<p>Reservation Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('reservation.create') }}">Create</a>
    <a class="btn btn-default" href="{{ route('reservation.index') }}">View All</a>
</p>
@endsection
