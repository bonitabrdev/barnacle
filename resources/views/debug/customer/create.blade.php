@extends('layouts.simple.panel')

@section('panel_heading', 'Create Customer')

@section('panel_body')
<form method="POST" action="{{ route('debug.customer.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" />
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" />
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" />
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" />
    </div>
    <div class="form-group">
        <label for="home_street">Home Street</label>
        <input type="text" class="form-control" id="home_street" name="home_street" placeholder="Home Street" />
    </div>
    <div class="form-group">
        <label for="home_city">Home City</label>
        <input type="text" class="form-control" id="home_city" name="home_city" placeholder="Home City" />
    </div>
    <div class="form-group">
        <label for="home_state">Home State</label>
        <input type="text" class="form-control" id="home_state" name="home_state" placeholder="Home State" />
    </div>
    <div class="form-group">
        <label for="home_zip">Home Zip</label>
        <input type="text" class="form-control" id="home_zip" name="home_zip" placeholder="Home Zip" />
    </div>
    <div class="form-group">
        <label for="local_street">Local Street</label>
        <input type="text" class="form-control" id="local_street" name="local_street" placeholder="Local Street" />
    </div>
    <div class="form-group">
        <label for="local_city">Local City</label>
        <input type="text" class="form-control" id="local_city" name="local_city" placeholder="Local City" />
    </div>
    <div class="form-group">
        <label for="local_state">Local State</label>
        <input type="text" class="form-control" id="local_state" name="local_state" placeholder="Local State" />
    </div>
    <div class="form-group">
        <label for="local_zip">Local Zip</label>
        <input type="text" class="form-control" id="local_zip" name="local_zip" placeholder="Local Zip" />
    </div>
    <div class="form-group">
        <label for="drivers_license">Drivers License</label>
        <input type="text" class="form-control" id="drivers_license" name="drivers_license" placeholder="Drivers License" />
    </div>
    <div class="form-group">
        <label for="email">E-mail Address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Create New Customer</button>
    </div>
</form>
@endsection
