@extends('layouts.simple.panel')

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/reservation.js') }}"></script>
@endpush

@section('panel_heading', 'Create Reservation')

@section('panel_body')
<form method="POST" action="{{ route('reservation.store') }}">
    {{ csrf_field() }}
    <input type="hidden" id="reserved_slots" name="reserved_slots" value="" />
    <div class="row">
        <div class="col-md-12">
            <h3>Reserved Date and Hours</h3>
        </div> <!-- .col-md-12 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-3">
            <p><strong>Date:</strong> <span id="reserved_date"></span></p>
        </div> <!-- .col-md-3 -->
        <div class="col-md-3">
            <p><strong>Start:</strong> <span id="reserved_start_time"></span></p>
        </div> <!-- .col-md-3 -->
        <div class="col-md-3">
            <p><strong>End:</strong> <span id="reserved_end_time"></span></p>
        </div> <!-- .col-md-3 -->
        <div class="col-md-3">
            <p><strong>Hours:</strong> <span id="reserved_num_hours"></span></p>
        </div> <!-- .col-md-3 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-3">
            <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reservation_slots_modal">Choose Reservation Slots...</button></p>
        </div> <!-- .col-md-3 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <h3>Reservation Information</h3>
        </div> <!-- .col-md-12 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="num_people">Number of People</label>
                <input type="text" class="form-control" id="num_people" name="num_people" placeholder="Ex. 8" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="text" class="form-control" id="total_price" name="total_price" placeholder="Ex. 236" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <h3>Customer Information</h3>
        </div> <!-- .col-md-12 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-6 -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-6 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="home_street">Home Street</label>
                <input type="text" class="form-control" id="home_street" name="home_street" placeholder="Home Street" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-6 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="home_city">Home City</label>
                <input type="text" class="form-control" id="home_city" name="home_city" placeholder="Home City" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="home_state">Home State</label>
                <input type="text" class="form-control" id="home_state" name="home_state" placeholder="Home State" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="home_zip">Home Zip</label>
                <input type="text" class="form-control" id="home_zip" name="home_zip" placeholder="Home Zip" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="local_street">Local Street</label>
                <input type="text" class="form-control" id="local_street" name="local_street" placeholder="Local Street" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-6 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="local_city">Local City</label>
                <input type="text" class="form-control" id="local_city" name="local_city" placeholder="Local City" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="local_state">Local State</label>
                <input type="text" class="form-control" id="local_state" name="local_state" placeholder="Local State" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="local_zip">Local Zip</label>
                <input type="text" class="form-control" id="local_zip" name="local_zip" placeholder="Local Zip" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-4 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="drivers_license">Drivers License</label>
                <input type="text" class="form-control" id="drivers_license" name="drivers_license" placeholder="Drivers License" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-6 -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address" />
            </div> <!-- .form-group -->
        </div> <!-- .col-md-6 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Create Reservation</button>
        </div> <!-- .col-md-4 -->
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
                    </div> <!-- .col-md-3 -->
                    <div class="col-md-3">
                        <p><strong>Month</strong></p>
                        <p><input type="text" class="form-control" id="reservation_slots_query_month" /></p>
                    </div> <!-- .col-md-3 -->
                    <div class="col-md-3">
                        <p><strong>Day</strong></p>
                        <p><input type="text" class="form-control" id="reservation_slots_query_day" /></p>
                    </div> <!-- .col-md-3 -->
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <p><button type="button" class="btn btn-primary" id="btn_reservation_slots_query">Show</button></p>
                    </div> <!-- .col-md-3 .col-md-offset-9 -->
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <p>Showing slots for <strong><span id="reservation_slots_date"></span></strong></p>
                    </div> <!-- .col-md-12 -->
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="reservation_slots_table">
                            <thead>
                                <tr>
                                    <th>Boat</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div> <!-- .col-md-12 -->
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
