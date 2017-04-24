@extends('layouts.simple.panel')

@section('panel_heading', 'Edit Customer')

@section('panel_body')
<form method="POST" action="{{ route('customer.update', ['id' => $customer->id]) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}" />
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}" />
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob" value="{{ $customer->dob }}" />
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" />
    </div>
    <div class="form-group">
        <label for="home_street">Home Street</label>
        <input type="text" class="form-control" id="home_street" name="home_street" value="{{ $customer->home_street }}" />
    </div>
    <div class="form-group">
        <label for="home_city">Home City</label>
        <input type="text" class="form-control" id="home_city" name="home_city" value="{{ $customer->home_city }}" />
    </div>
    <div class="form-group">
        <label for="home_state">Home State</label>
        <input type="text" class="form-control" id="home_state" name="home_state" value="{{ $customer->home_state }}" />
    </div>
    <div class="form-group">
        <label for="home_zip">Home Zip</label>
        <input type="text" class="form-control" id="home_zip" name="home_zip" value="{{ $customer->home_zip }}" />
    </div>
    <div class="form-group">
        <label for="local_street">Local Street</label>
        <input type="text" class="form-control" id="local_street" name="local_street" value="{{ $customer->local_street }}" />
    </div>
    <div class="form-group">
        <label for="local_city">Local City</label>
        <input type="text" class="form-control" id="local_city" name="local_city" value="{{ $customer->local_city }}" />
    </div>
    <div class="form-group">
        <label for="local_state">Local State</label>
        <input type="text" class="form-control" id="local_state" name="local_state" value="{{ $customer->local_state }}" />
    </div>
    <div class="form-group">
        <label for="local_zip">Local Zip</label>
        <input type="text" class="form-control" id="local_zip" name="local_zip" value="{{ $customer->local_zip }}" />
    </div>
    <div class="form-group">
        <label for="drivers_license">Drivers License</label>
        <input type="text" class="form-control" id="drivers_license" name="drivers_license" value="{{ $customer->drivers_license }}" />
    </div>
    <div class="form-group">
        <label for="email">E-mail Address</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $customer->email }}" />
    </div>
    <div class="form-group">
        <button class="btn btn-default" type="submit">Update</button>
    </div>
</form>
@endsection
