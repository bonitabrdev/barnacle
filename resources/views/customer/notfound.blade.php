@extends('layouts.simple.panel')

@section('panel_heading', 'Customer Not Found')

@section('panel_body')
<p>No customer matching ID <strong>{{ $id }}</strong> found.</p>
@endsection
