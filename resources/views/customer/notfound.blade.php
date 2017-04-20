@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customer Not Found</div>
                <div class="panel-body">
                    <p>No customer matching ID <strong>{{ $id }}</strong> found.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
