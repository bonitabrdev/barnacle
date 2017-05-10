@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reservations</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Create</a></li>
                        <li><a href="#">Find</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Create</a></li>
                        <li><a href="#">Find</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('heading')</div>
                <div class="panel-body">@yield('body')</div>
            </div>
        </div>
    </div>
</div>
@endsection
