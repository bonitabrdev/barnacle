@extends('admin.base')

@push('footer_scripts')
<script type="text/javascript" src="{{ mix('js/admin/constraints.js') }}"></script>
@endpush

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
