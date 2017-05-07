@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administration</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Manage</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('admin.constraints.manage') }}">Constraints</a></li>
                        <li><a href="{{ route('admin.users.manage') }}">Users</a></li>
                        <li><a href="{{ route('admin.settings.manage') }}">Settings</a></li>
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
