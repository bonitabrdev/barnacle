@extends('layouts.simple.panel')

@section('panel_heading', 'Make Slots for Day')

@section('panel_body')
<form method="POST" action="{{ route('reservation_slots.make.do') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="year">Year</label>
        <input type="text" class="form-control" id="year" name="year" placeholder="Year" />
    </div>
    <div class="form-group">
        <label for="month">Month</label>
        <input type="text" class="form-control" id="month" name="month" placeholder="Month" />
    </div>
    <div class="form-group">
        <label for="day">Day</label>
        <input type="text" class="form-control" id="day" name="day" placeholder="Day" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Make Slots</button>
    </div>
</form>
@endsection
