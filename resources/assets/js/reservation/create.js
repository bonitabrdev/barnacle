// js/reservation/create.js

import BarnacleInputDate from '../components/BarnacleInputDate.vue';
import BarnacleInputPhone from '../components/BarnacleInputPhone.vue';
import BarnacleInputText from '../components/BarnacleInputText.vue';
import BarnacleInputTime from '../components/BarnacleInputTime.vue';
import BarnacleModal from '../components/BarnacleModal.vue';
import BarnacleWarnings from '../components/BarnacleWarnings.vue';

new Vue({
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
            id: null,
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
    components: {
        BarnacleInputDate,
        BarnacleInputPhone,
        BarnacleInputText,
        BarnacleInputTime,
        BarnacleModal,
        BarnacleWarnings
    },
    methods: {
        submitReservation: function (event) {
            Promise.resolve()
                .then(() => {
                    this.modals.processing.show = true;
                }).then(() => {
                    if (this.customer.id === null) {
                        return this.createCustomer();
                    } else if (this.options.updateExistingCustomer) {
                        return this.updateCustomer();
                    }
                }).then(() => {
                    return this.createReservation();
                }).then(() => {
                    window.location = '/reservations/' + this.reservation.id;
                }).catch(error => {
                    this.modals.processing.show = false;
                });
        },
        createCustomer: function () {
            console.log('Called createCustomer()');
            return axios.post('/json/customers', this.customer)
                .then(response => {
                    console.log(response.data);
                    this.customer = response.data;
                    return response;
                }).catch(error => {
                    console.log(error);
                    console.log(error.response);
                    console.log(error.response.data);
                    for (let field in error.response.data) {
                        this.errors.customer[field] = error.response.data[field];
                    }
                    throw error;
                });
        },
        updateCustomer: function () {
            console.log('Called updateCustomer()');
            return axios.put('/json/customers/' + this.customer.id, this.customer)
                .then(response => {
                    console.log(response.data);
                    this.customer = response.data;
                    return response;
                }).catch(error => {
                    console.log(error.response.data);
                    for (let field in error.response.data) {
                        this.errors.customer[field] = error.response.data[field];
                    }
                    throw error;
                });
        },
        createReservation: function () {
            console.log('Called createReservation()');
            this.reservation.customer_id = this.customer.id;

            return axios.post('/json/reservations', this.reservation)
                .then(response => {
                    console.log(response.data);
                    this.reservation = response.data;
                    return response;
                }).catch(error => {
                    console.log(error.response.data);
                    if (error.response.status == 409) {
                        // conflict error
                        for (let warning in error.response.data.warnings) {
                            this.warnings.push(error.response.data.warnings[warning]);
                        }
                    } else {
                        for (let field in error.response.data) {
                            this.errors.reservation[field] = error.response.data[field];
                        }
                    }
                    throw error;
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
