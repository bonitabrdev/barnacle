@extends('layouts.simple.panel')

@section('panel_heading', 'Boat Not Found')

@section('panel_body')
<p>No boat matching ID <strong>{{ $id }}</strong> found.</p>
@endsection
