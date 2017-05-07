@extends('layouts.simple.panel')

@section('panel_heading', 'Create Constraint')

@section('panel_body')
<form method="POST" action="{{ route('debug.constraint.store') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <h3>Constrained Date</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" name="year" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="month">Month</label>
                <input type="text" class="form-control" id="month" name="month" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="day">Day</label>
                <input type="text" class="form-control" id="day" name="day" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Start Time</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="start_hour">Hour</label>
                <input type="text" class="form-control" id="start_hour" name="start_hour" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="start_minute">Minute</label>
                <input type="text" class="form-control" id="start_minute" name="start_minute" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="start_second">Second</label>
                <input type="text" class="form-control" id="start_second" name="start_second" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>End Time</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="end_hour">Hour</label>
                <input type="text" class="form-control" id="end_hour" name="end_hour" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="end_minute">Minute</label>
                <input type="text" class="form-control" id="end_minute" name="end_minute" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="end_second">Second</label>
                <input type="text" class="form-control" id="end_second" name="end_second" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Data</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="num_40hp">40HP</label>
                <input type="text" class="form-control" id="num_40hp" name="num_40hp" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="num_60hp">60HP</label>
                <input type="text" class="form-control" id="num_60hp" name="num_60hp" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection
