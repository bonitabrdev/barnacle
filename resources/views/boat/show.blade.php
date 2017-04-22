@extends('layouts.simple.panel')

@section('panel_heading', 'Boat Information')

@section('panel_body')
<p><strong>Boat ID:</strong> {{ $boat->id }}</p>
<ul>
    <li><strong>Boat Name:</strong> {{ $boat->name }}</li>
    <li><strong>Boat Type:</strong> {{ $boat->type }}</li>
</ul>
@endsection
