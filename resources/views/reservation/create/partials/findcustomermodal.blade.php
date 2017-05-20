<barnacle-modal
    title="Find Existing Customer"
    v-bind:show="modals.findCustomer.show"
    v-on:close="modals.findCustomer.show = false">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <barnacle-input-phone v-model="modals.findCustomer.phone">Phone Number</barnacle-input-phone>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" v-on:click="findCustomer">Find Customer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
                <table class="table table-bordered table-hover" v-if="modals.findCustomer.customers.length > 0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(customer, index) in modals.findCustomer.customers">
                            <td>@{{ customer.id }}</td>
                            <td>@{{ customer.first_name }}</td>
                            <td>@{{ customer.last_name }}</td>
                            <td>@{{ customer.dob }}</td>
                            <td>@{{ customer.phone }}</td>
                            <td><button type="button" class="btn btn-success" v-on:click="useCustomer(index)">Use</button></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</barnacle-modal>
