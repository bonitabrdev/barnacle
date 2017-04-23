@extends('layouts.simple.panel')

@section('panel_heading', 'Boats')

@section('panel_body')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($boats as $boat)
            <tr>
                <td>{{ $boat->id }}</td>
                <td>{{ $boat->name }}</td>
                <td>{{ $boat->type }}</td>
                <td>
                    <a class="btn btn-default" href="{{ route('boat.show', ['id' => $boat->id]) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
