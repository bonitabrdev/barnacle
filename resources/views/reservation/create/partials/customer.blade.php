<barnacle-modal
    title="Find Existing Customer"
    v-bind:show="modals.findCustomer.show"
    v-on:close="modals.findCustomer.show = false"
    v-on:ok="modals.findCustomer.show = false">
    <p>This is the find existing customer dialog.</p>
</barnacle-modal>
<div class="row">
    <div class="col-md-6">
        <h4>Customer Information</h4>
    </div>
    <div class="col-md-6">
        <button
            type="button"
            class="btn btn-default"
            v-on:click="modals.findCustomer.show = true">Use Existing Customer...</button>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.name.first"
            v-bind:errors="errors.customer"
            name="name.first">First Name</barnacle-input-text>
    </div>
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.name.last"
            v-bind:errors="errors.customer"
            name="name.last">Last Name</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-phone
            v-model="customer.phone"
            v-bind:errors="errors.customer"
            name="phone">Phone Number</barnacle-input-phone>
    </div>
    <div class="col-md-3">
        <barnacle-input-date
            v-model="customer.dob"
            v-bind:errors="errors.customer"
            name="dob">Date of Birth</barnacle-input-date>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.driversLicense"
            v-bind:errors="errors.customer"
            name="driversLicense">Drivers License</barnacle-input-text>
    </div>
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.email"
            v-bind:errors="errors.customer"
            name="email">E-mail Address</barnacle-input-text>
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
            v-model="customer.address.home.street"
            v-bind:errors="errors.customer"
            name="address.home.street">Street</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.address.home.city"
            v-bind:errors="errors.customer"
            name="address.home.city">City</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.address.home.state"
            v-bind:errors="errors.customer"
            name="address.home.state">State</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.address.home.zip"
            v-bind:errors="errors.customer"
            name="address.home.zip">Zip</barnacle-input-text>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h5>Local Address</h5>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-default" v-on:click="copyHomeToLocal">Copy Home Address</button>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <barnacle-input-text
            v-model="customer.address.local.street"
            v-bind:errors="errors.customer"
            name="address.local.street">Street</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="customer.address.local.city"
            v-bind:errors="errors.customer"
            name="address.local.city">City</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.address.local.state"
            v-bind:errors="errors.customer"
            name="address.local.state">State</barnacle-input-text>
    </div>
    <div class="col-md-2">
        <barnacle-input-text
            v-model="customer.address.local.zip"
            v-bind:errors="errors.customer"
            name="address.local.zip">Zip Code</barnacle-input-text>
    </div>
</div>
