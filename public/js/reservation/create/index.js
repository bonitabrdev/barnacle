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
            name: {
                first: '',
                last: ''
            },
            phone: '',
            dob: '',
            driversLicense: '',
            email: '',
            address: {
                home: {
                    street: '',
                    city: '',
                    state: '',
                    zip: ''
                },
                local: {
                    street: '',
                    city: '',
                    state: '',
                    zip: ''
                }
            }
        },
        errors: {
            customer: new Errors()
        },
        modals: {
            findCustomer: {
                show: false
            }
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
        createReservation: function() {

        },
        copyHomeToLocal: function() {
            this.customer.address.local.street = this.customer.address.home.street;
            this.errors.customer.clear('address.local.street');
            this.customer.address.local.city = this.customer.address.home.city;
            this.errors.customer.clear('address.local.city');
            this.customer.address.local.state = this.customer.address.home.state;
            this.errors.customer.clear('address.local.state');
            this.customer.address.local.zip = this.customer.address.home.zip;
            this.errors.customer.clear('address.local.zip');
        }
    }
});
