// js/reservation/create.js

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
        reservation: {
            reservedDate: (new Date(Date.now())).toISOString().split('T')[0],
            start: '09:00:00',
            end: '17:00:00',
            numPeople: 1,
            totalPrice: 236,
            type: '40HP'
        }
    },
    methods: {
        saveCustomer: function (event) {
            var url = '/json/customers';
            var data = {
                _token: window.Laravel.csrfToken,
                first_name: this.customer.name.first,
                last_name: this.customer.name.last,
                phone: this.customer.phone,
                dob: this.customer.dob,
                drivers_license: this.customer.driversLicense,
                email: this.customer.email,
                home_street: this.customer.address.home.street,
                home_city: this.customer.address.home.city,
                home_state: this.customer.address.home.state,
                home_zip: this.customer.address.home.zip,
                local_street: this.customer.address.local.street,
                local_city: this.customer.address.local.city,
                local_state: this.customer.address.local.state,
                local_zip: this.customer.address.local.zip
            };

            $.ajax({
                context: this,
                url: url,
                data: data,
                dataType: 'json',
                method: 'POST'
            }).done(function (data, textStatus, jqXHR) {
                console.log('AJAX Done: ' + textStatus);
                console.log(data);

                this.customer.id = data.id;
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            });
        },
        submitReservation: function (event) {
            var url = '/json/reservations/create/requests';
            var data = {
                _token: window.Laravel.csrfToken,
                customer_id: this.customer.id,
                reserved_date: this.reservation.reservedDate,
                start: this.reservation.start,
                end: this.reservation.end,
                num_people: this.reservation.numPeople,
                total_price: this.reservation.totalPrice,
                type: this.reservation.type
            };

            $.ajax({
                context: this,
                url: url,
                data: data,
                dataType: 'json',
                method: 'POST'
            }).done(function (data, textStatus, jqXHR) {

            }).fail(function (jqXHR, textStatus, errorThrown) {

            });
        }
    }
});
