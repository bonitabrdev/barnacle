@extends('layouts.simple.panel')

@section('panel_heading', 'Reservation Slots')

@section('panel_body')
<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($slot_dates as $slot_date)
            <tr>
                <td>{{ $slot_date->toDateString() }}</td>
                <td>
                    <a class="btn btn-default" href="{{ route('reservation_slots.showforday', ['year' => $slot_date->year, 'month' => $slot_date->month, 'day' => $slot_date->day]) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
