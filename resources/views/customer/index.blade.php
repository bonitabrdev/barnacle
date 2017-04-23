@extends('layouts.simple.panel')

@section('panel_heading', 'Customers')

@section('panel_body')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a class="btn btn-default" href="{{ route('customer.show', ['id' => $customer->id]) }}">View</a>
                </td>
        @endforeach
    </tbody>
</table>
@endsection
