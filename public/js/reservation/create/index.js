// js/reservation/create/index.js

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
        reservation: {
            customer_id: null,
            reserved_date: (new Date(Date.now())).toISOString().split('T')[0],
            start: '09:00:00',
            end: '17:00:00',
            num_people: '',
            total_price: '',
            type: '40HP'
        },
        errors: {
            customer: {
                first_name: [],
                last_name: [],
                phone: [],
                dob: [],
                drivers_license: [],
                email: [],
                home_street: [],
                home_city: [],
                home_state: [],
                home_zip: [],
                local_street: [],
                local_city: [],
                local_state: [],
                local_zip: []
            },
            reservation: {
                reserved_date: [],
                start: [],
                end: [],
                num_people: [],
                total_price: [],
                type: []
            }
        },
        modals: {
            findCustomer: {
                show: false,
                phone: '',
                customers: []
            },
            processing: {
                show: false
            }
        },
        options: {
            updateExistingCustomer: false
        },
        warnings: []
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
            this.modals.processing.show = true;

            if (this.customer.id === null) {
                this.createCustomer()
                    .then(response => {
                        this.createReservation()
                            .then(response => {
                                // the reservation was successfully created
                            }).catch(error => {
                                this.modals.processing.show = false;
                            });
                    }).catch(error => {
                        this.modals.processing.show = false;
                    });
            } else {
                if (this.options.updateExistingCustomer) {
                    this.updateCustomer()
                        .then(response => {
                            this.createReservation()
                                .then(response => {
                                    // the reservation was successfully created
                                }).catch(error => {
                                    this.modals.processing.show = false;
                                });
                        }).catch(error => {
                            this.modals.processing.show = false;
                        });
                } else {
                    this.createReservation()
                        .then(response => {
                            // the reservation was successfully created
                        }).catch(error => {
                            this.modals.processing.show = false;
                        });
                }
            }
        },
        createCustomer: function () {
            return new Promise ((resolve, reject) => {
                axios.post('/json/customers', this.customer)
                    .then(response => {
                        console.log(response.data);
                        this.customer = response.data;
                        resolve(response);
                    }).catch(error => {
                        console.log(error);
                        console.log(error.response);
                        console.log(error.response.data);
                        for (field in error.response.data) {
                            this.errors.customer[field] = error.response.data[field];
                        }
                        reject(error);
                    });
            });
        },
        updateCustomer: function () {
            return new Promise((resolve, reject) => {
                axios.put('/json/customers/' + this.customer.id, this.customer)
                    .then(response => {
                        console.log(response.data);
                        this.customer = response.data;
                        resolve(response);
                    }).catch(error => {
                        console.log(error.response.data);
                        for (field in error.response.data) {
                            this.errors.customer[field] = error.response.data[field];
                        }
                        reject(error);
                    });
            });
        },
        createReservation: function () {
            this.reservation.customer_id = this.customer.id;

            return new Promise((resolve, reject) => {
                axios.post('/json/reservations', this.reservation)
                    .then(response => {
                        console.log(response.data);
                        this.reservation = response.data;
                        resolve(response);
                    }).catch(error => {
                        console.log(error.response.data);
                        if (error.response.status == 409) {
                            // conflict error
                        } else {
                            for (field in error.response.data) {
                                this.errors.reservation[field] = error.response.data[field];
                            }
                        }
                        reject(error);
                    });
            });
        },
        copyHomeToLocal: function () {
            this.customer.local_street = this.customer.home_street;
            this.errors.customer.local_street = [];
            this.customer.local_city = this.customer.home_city;
            this.errors.customer.local_city = [];
            this.customer.local_state = this.customer.home_state;
            this.errors.customer.local_state = [];
            this.customer.local_zip = this.customer.home_zip;
            this.errors.customer.local_zip = [];
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
            for (let field in this.errors.customer) {
                this.errors.customer[field] = [];
            }
        }
    }
});
