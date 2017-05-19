@include('reservation.create.partials.findcustomermodal')
<div class="row">
    <div class="col-md-6">
        <h4>Customer Information</h4>
    </div>
    <div class="col-md-3">
        <button
            type="button"
            class="btn btn-default"
            v-on:click="modals.findCustomer.show = true">Use Existing Customer...</button>
    </div>
    <div class="col-md-3" v-if="showUpdateExistingCustomer">
        <input type="checkbox" v-model="options.updateExistingCustomer">
        <label>Update Customer</label>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.first_name"
            v-bind:errors="errors.customer"
            name="first_name"
            v-bind:disabled="disableFields">First Name</barnacle-input-text>
    </div>
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.last_name"
            v-bind:errors="errors.customer"
            name="last_name"
            v-bind:disabled="disableFields">Last Name</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-phone
            v-model="customer.phone"
            v-bind:errors="errors.customer"
            name="phone"
            v-bind:disabled="disableFields">Phone Number</barnacle-input-phone>
    </div>
    <div class="col-md-3">
        <barnacle-input-date
            v-model="customer.dob"
            v-bind:errors="errors.customer"
            name="dob"
            v-bind:disabled="disableFields">Date of Birth</barnacle-input-date>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.drivers_license"
            v-bind:errors="errors.customer"
            name="drivers_license"
            v-bind:disabled="disableFields">Drivers License</barnacle-input-text>
    </div>
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.email"
            v-bind:errors="errors.customer"
            name="email"
            v-bind:disabled="disableFields">E-mail Address</barnacle-input-text>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h5>Home Address</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.home_street"
            v-bind:errors="errors.customer"
            name="home_street"
            v-bind:disabled="disableFields">Street</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.home_city"
            v-bind:errors="errors.customer"
            name="home_city"
            v-bind:disabled="disableFields">City</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.home_state"
            v-bind:errors="errors.customer"
            name="home_state"
            v-bind:disabled="disableFields">State</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.home_zip"
            v-bind:errors="errors.customer"
            name="home_zip"
            v-bind:disabled="disableFields">Zip</barnacle-input-text>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h5>Local Address</h5>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-default" v-on:click="copyHomeToLocal" v-bind:disabled="disableFields">Copy Home Address</button>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.local_street"
            v-bind:errors="errors.customer"
            name="local_street"
            v-bind:disabled="disableFields">Street</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.local_city"
            v-bind:errors="errors.customer"
            name="local_city"
            v-bind:disabled="disableFields">City</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.local_state"
            v-bind:errors="errors.customer"
            name="local_state"
            v-bind:disabled="disableFields">State</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.local_zip"
            v-bind:errors="errors.customer"
            name="local_zip"
            v-bind:disabled="disableFields">Zip Code</barnacle-input-text>
    </div>
</div>
