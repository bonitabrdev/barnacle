@extends('layouts.base')

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/reservation/create.js') }}"></script>
@endpush

@section('heading', 'Create Reservation')

@section('body')
<div id="create_reservation">
    <div class="row">
        <div class="col-md-12">
            <h4>Customer Information</h4>
        </div>
    </div>

    <div class="row" v-if="customer.id === null">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_customer_modal">New Customer</button>
            <button type="button" class="btn btn-default">Existing Customer</button>
        </div>
    </div>

    <template v-if="customer.id !== null">
        <div class="row">
            <div class="col-md-4">
                <p><strong>First Name:</strong> @{{ customer.name.first }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Last Name:</strong> @{{ customer.name.last }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Phone Number:</strong> @{{ customer.phone }}</p>
            </div>
            <div class="col-md-5">
                <p><strong>Date of Birth:</strong> @{{ customer.dob }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Drivers License:</strong> @{{ customer.driversLicense }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>E-mail Address:</strong> @{{ customer.email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Home Address</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Street:</strong> @{{ customer.address.home.street }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>City:</strong> @{{ customer.address.home.city }}</p>
            </div>
            <div class="col-md-2">
                <p><strong>State:</strong> @{{ customer.address.home.state }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Zip Code:</strong> @{{ customer.address.home.zip }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Local Address</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Street:</strong> @{{ customer.address.local.street }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>City:</strong> @{{ customer.address.local.city }}</p>
            </div>
            <div class="col-md-2">
                <p><strong>State:</strong> @{{ customer.address.local.state }}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Zip Code:</strong> @{{ customer.address.local.zip }}</p>
            </div>
        </div>
    </template>

    <div class="modal" id="new_customer_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" v-model="customer.name.first" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" v-model="customer.name.last" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" v-model="customer.phone" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" v-model="customer.dob" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Drivers License</label>
                                <input type="text" class="form-control" v-model="customer.driversLicense" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail Address</label>
                                <input type="text" class="form-control" v-model="customer.email" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Home Address</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Street</label>
                                <input type="text" class="form-control" v-model="customer.address.home.street" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" v-model="customer.address.home.city" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" v-model="customer.address.home.state" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" v-model="customer.address.home.zip" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Local Address</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Street</label>
                                <input type="text" class="form-control" v-model="customer.address.local.street" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" v-model="customer.address.local.city" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" v-model="customer.address.local.state" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" v-model="customer.address.local.zip" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="saveCustomer">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <hr />
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Reservation Information</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Reserved Date</label>
                <input type="date" class="form-control" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Start Time</label>
                <input type="time" class="form-control" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>End Time</label>
                <input type="time" class="form-control" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Number of People</label>
                <input type="text" class="form-control" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Total Price</label>
                <input type="text" class="form-control" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Boat Type</label>
                <div class="radio">
                    <label><input type="radio" name="boat_type" value="40HP" />40HP</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="boat_type" value="60HP" />60HP</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary">Submit Reservation</button>
            </div>
        </div>
    </div>
</div>
@endsection
