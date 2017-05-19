// js/reservation/create/index.js

var Errors = function () {
    this.errors = {};
};

Errors.prototype.has = function (field) {
    return this.errors.hasOwnProperty(field);
};

Errors.prototype.get = function (field) {
    return this.errors[field];
};

Errors.prototype.record = function (newErrors) {
    this.errors = newErrors;
};

Errors.prototype.clear = function (field) {
    delete this.errors[field];
};


var vmCreateReservation = new Vue({
    el: '#create_reservation',
    data: {
        customer: {
            id: null,
            first_name: '',
            last_name: '',
            phone: '',
            dob: '',
            drivers_license: '',
            email: '',
            home_street: '',
            home_city: '',
            home_state: '',
            home_zip: '',
            local_street: '',
            local_city: '',
            local_state: '',
            local_zip: ''
        },
        errors: {
            customer: new Errors()
        },
        modals: {
            findCustomer: {
                show: false,
                phone: '',
                customers: []
            }
        },
        options: {
            updateExistingCustomer: false
        }
    },
    computed: {
        showUpdateExistingCustomer: function () {
            return this.customer.id !== null;
        },
        disableFields: function () {
            return this.showUpdateExistingCustomer && !this.options.updateExistingCustomer;
        }
    },
    methods: {
        submitReservation: function (event) {
            this.createCustomer();
            this.createReservation();
        },
        createCustomer: function () {
            axios.post('/json/customers', this.customer)
                .then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(error.response.data);
                    this.errors.customer.record(error.response.data);
                });
        },
        createReservation: function () {

        },
        copyHomeToLocal: function () {
            this.customer.local_street = this.customer.home_street;
            this.errors.customer.clear('local_street');
            this.customer.local_city = this.customer.home_city;
            this.errors.customer.clear('local_city');
            this.customer.local_state = this.customer.home_state;
            this.errors.customer.clear('local_state');
            this.customer.local_zip = this.customer.home_zip;
            this.errors.customer.clear('local_zip');
        },
        findCustomer: function () {
            axios.get('/json/customers/phone/' + this.modals.findCustomer.phone)
                .then(response => {
                    console.log(response.data);
                    this.modals.findCustomer.customers = response.data;
                }).catch(error => {
                    console.log(error.response.data);
                });
        },
        useCustomer: function (index) {
            this.customer = this.modals.findCustomer.customers[index];
            this.modals.findCustomer.show = false;
        }
    }
});
