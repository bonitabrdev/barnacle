@extends('layouts.simple.panel')

@section('panel_heading', 'Constraint Not Found')

@section('panel_body')
<p>Could not find constraint with ID: <strong>{{ $id }}</strong></p>
@endsection
