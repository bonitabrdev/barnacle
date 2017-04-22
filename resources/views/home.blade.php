@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>
                    <p>Cutomer Management:</p>
                    <p>
                        <a class="btn btn-default" href="{{ route('customer.create') }}">Create</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection