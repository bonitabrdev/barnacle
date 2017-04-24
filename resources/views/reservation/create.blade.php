@extends('layouts.simple.panel')

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/reservation.js') }}"></script>
@endpush

@section('panel_heading', 'Create Reservation')

@section('panel_body')
<form method="POST" action="{{ route('reservation.store') }}">
    <div class="row">
        <div class="col-md-12">
            <h3>Reserved Date and Hours</h3>
        </div>
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-3">
            <p><strong>Date:</strong> <span id="reserved_date"></span></p>
        </div>
        <div class="col-md-3">
            <p><strong>Start:</strong> <span id="reserved_start_time"></span></p>
        </div>
        <div class="col-md-3">
            <p><strong>End:</strong> <span id="reserved_end_time"></span></p>
        </div>
        <div class="col-md-3">
            <p><strong>Hours:</strong> <span id="reserved_num_hours"></span></p>
        </div>
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-3">
            <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reservation_slots_modal">Choose Reservation Slots...</button></p>
        </div>
    </div> <!-- .row -->
</form>
<div class="modal fade" id="reservation_slots_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reserve Slots</h4>
            </div> <!-- .modal-header -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>Year</strong></p>
                        <p><input type="text" class="form-control" id="reservation_slots_query_year" /></p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Month</strong></p>
                        <p><input type="text" class="form-control" id="reservation_slots_query_month" /></p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Day</strong></p>
                        <p><input type="text" class="form-control" id="reservation_slots_query_day" /></p>
                    </div>
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <p><button type="button" class="btn btn-primary" id="btn_reservation_slots_query">Show</button></p>
                    </div>
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <p>Showing slots for <strong><span id="reservation_slots_date"></span></strong></p>
                    </div>
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="reservation_slots_table">
                            <thead>
                                <tr>
                                    <th>Boat</th>
                                    <th>Time Slots</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_save_reservation_slots">Save</button>
            </div> <!-- .modal-footer -->
        </div> <!-- .modal-content -->
    </div> <!-- .modal-dialog -->
</div> <!-- .modal -->
@endsection
