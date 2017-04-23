@extends('layouts.simple.panel')

@section('panel_heading', 'Show Slots for Day')

@section('panel_body')
<p>Showing reservation slots for <strong>{{ $year }}-{{ $month }}-{{ $day }}</strong>:</p>
<p>
    <ul>
        @foreach ($slots as $slot)
            <li>
                <strong>Slot ID:</strong> {{ $slot->id }}
                <ul>
                    <li><strong>Boat ID:</strong> {{ $slot->boat_id }}</li>
                    <li><strong>Reservation Date:</strong> {{ $slot->reservation_date }}</li>
                    <li><strong>Start Time:</strong> {{ $slot->start_time }}</li>
                    <li><strong>End Time:</strong> {{ $slot->end_time }}</li>
                    <li><strong>Available:</strong> {{ $slot->available }}</li>
                </ul>
            </li>
        @endforeach
    </ul>
</p>
@endsection
