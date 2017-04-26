@extends('layouts.simple.panel')

@section('panel_heading', 'Reservation Not Found')

@section('panel_body')
<p>No reservation matching ID <strong>{{ $id }}</strong> found.</p>
@endsection
