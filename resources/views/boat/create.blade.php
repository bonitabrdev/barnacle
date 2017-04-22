@extends('layouts.simple.panel')

@section('panel_heading', 'Create Boat')

@section('panel_body')
<form method="POST" action="{{ route('boat.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="boat_name">Boat Name</label>
        <input type="text" class="form-control" id="boat_name" name="boat_name" placeholder="Boat Name" />
    </div>
    <div class="form-group">
        <label for="boat_type">Boat Type</label>
        <input type="text" class="form-control" id="boat_type" name="boat_type" placeholder="Boat Type" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Create New Boat</button>
    </div>
</form>
@endsection
