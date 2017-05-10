@extends('layouts.simple.panel')

@section('panel_heading', 'Constraint Information')

@section('panel_body')
<p><strong>Constraint ID:</strong> {{ $constraint->id }}</p>
<p>
    <ul>
        <li><strong>Constrained Date:</strong> {{ $constraint->date->toDateString() }}</li>
        <li><strong>Start Time:</strong> {{ $constraint->start->toTimeString() }}</li>
        <li><strong>End Time:</strong> {{ $constraint->end->toTimeString() }}</li>
        <li><strong>Number of 40HP:</strong> {{ $constraint->data['40HP'] }}</li>
        <li><strong>Number of 60HP:</strong> {{ $constraint->data['60HP'] }}</li>
    </ul>
</p>
@endsection
