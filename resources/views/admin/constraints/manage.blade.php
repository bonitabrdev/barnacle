@extends('admin.base')

@section('heading', 'Manage Constraints')

@section('body')
    @include('admin.constraints.partials.show')
    <div class="row">
        <div class="col-md-12">
            <hr />
        </div>
    </div>
    @include('admin.constraints.partials.create')
@endsection
