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
            v-bind:errors="errors.customer.first_name"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.first_name = []">First Name</barnacle-input-text>
    </div>
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.last_name"
            v-bind:errors="errors.customer.last_name"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.last_name = []">Last Name</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-phone
            v-model="customer.phone"
            v-bind:errors="errors.customer.phone"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.phone = []">Phone Number</barnacle-input-phone>
    </div>
    <div class="col-md-3">
        <barnacle-input-date
            v-model="customer.dob"
            v-bind:errors="errors.customer.dob"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.dob = []">Date of Birth</barnacle-input-date>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.drivers_license"
            v-bind:errors="errors.customer.drivers_license"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.drivers_license = []">Drivers License</barnacle-input-text>
    </div>
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.email"
            v-bind:errors="errors.customer.email"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.email = []">E-mail Address</barnacle-input-text>
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
            v-bind:errors="errors.customer.home_street"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.home_street = []">Street</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.home_city"
            v-bind:errors="errors.customer.home_city"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.home_city = []">City</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.home_state"
            v-bind:errors="errors.customer.home_state"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.home_state = []">State</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.home_zip"
            v-bind:errors="errors.customer.home_zip"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.home_zip = []">Zip</barnacle-input-text>
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
            v-bind:errors="errors.customer.local_street"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.local_street = []">Street</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.local_city"
            v-bind:errors="errors.customer.local_city"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.local_city = []">City</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.local_state"
            v-bind:errors="errors.customer.local_state"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.local_state = []">State</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.local_zip"
            v-bind:errors="errors.customer.local_zip"
            v-bind:disabled="disableFields"
            v-on:input="errors.customer.local_zip = []">Zip Code</barnacle-input-text>
    </div>
</div>
