@extends('layouts.base')

@push('footer_scripts')
<script type="text/javascript" src="{{ mix('js/home.js') }}"></script>
@endpush

@section('heading', 'Dashboard')

@section('body')
<div id="dashboard">
    <div class="row">
        <div class="col-md-3">
            <h4>Reservations Table</h4>
        </div>
        <div class="col-md-3">
            <barnacle-input-date v-model="date" v-on:input="fetchTables"></barnacle-input-date>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <barnacle-reservations-table
                v-if="tables !== null"
                v-for="(table, key) in tables"
                v-bind:table="table"
                v-bind:key="key"><h4>@{{ key }}</h4></barnacle-reservations-table>
        </div>
    </div>
</div>
@endsection
