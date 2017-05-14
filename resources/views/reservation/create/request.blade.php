@extends('layouts.base')

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/reservation/create/request.js') }}"></script>
@endpush

@section('heading', 'Create Reservation Request')

@section('body')
<script type="text/javascript">
window.requestId = {{ $id  }};
</script>
<div class="row">
    <div class="col-md-12">
        <p>Create reservation request with ID <strong>{{ $id }}</strong> is being processed...</p>
    </div>
</div>
@endsection
