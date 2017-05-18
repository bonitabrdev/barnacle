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
            dob: ''
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

        }
    }
});
