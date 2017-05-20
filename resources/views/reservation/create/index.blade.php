@extends('layouts.base')

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/reservation/create/components.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/reservation/create/index.js') }}"></script>
@endpush

@section('heading', 'Create Reservation')

@section('body')
<div id="create_reservation">
    @include('reservation.create.partials.customer')
    <div class="row">
        <div class="col-md-12">
            <hr />
        </div>
    </div>
    @include('reservation.create.partials.reservation')
    <barnacle-warnings v-bind:warnings="warnings" v-on:dismiss="warnings.splice($event.index, 1)"></barnacle-warnings>
    <div class="row">
        <div class="col-md-12">
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-6 col-md-6">
            <button type="button" class="btn btn-primary" v-on:click="submitReservation">Submit Reservation</button>
        </div>
    </div>
</div>
@endsection
