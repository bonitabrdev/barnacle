@extends('layouts.simple.panel')

@section('panel_heading', 'Dashboard')

@section('panel_body')
<p>You are logged in!</p>
<p>Cutomer Management:</p>
<p>
    <a class="btn btn-default" href="{{ route('customer.create') }}">Create</a>
</p>
@endsection
