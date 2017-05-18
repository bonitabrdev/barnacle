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
        <barnacle-input-phone v-model="customer.phone">Phone Number</barnacle-input-phone>
    </div>
    <div class="col-md-3">
        <barnacle-input-date v-model="customer.dob">Date of Birth</barnacle-input-date>
    </div>
</div>
