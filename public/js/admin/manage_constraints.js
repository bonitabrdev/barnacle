// js/admin/manage_constraints.js

(function ($) {
    $(document).ready(function () {
        $('.bindable-datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            onSelect: function (dateText, inst) {
                var e = document.createEvent('HTMLEvents');
                e.initEvent('input', true, true);
                this.dispatchEvent(e);
            }
        });
    });
})(jQuery);

var vm_view_current_constraints = new Vue({
    el: '#view_current_constraints',
    data: {
        hasConstraintData: false,
        constraintDate: '',
        constraint: {
            id: '',
            date: '',
            start: '',
            end: '',
            num_40hp: '',
            num_60hp: ''
        }
    },
    methods: {
        fetchConstraintData: function (event) {
            this.hasConstraintData = false;
            this.constraint.id = '';
            this.constraint.date = '';
            this.constraint.start = '';
            this.constraint.end = '';
            this.constraint.num_40hp = '';
            this.constraint.num_60hp = '';

            var url = '/json/constraints/date/' + this.constraintDate;

            $.ajax({
                url: url,
                context: this,
                dataType: 'json',
                method: 'GET'
            }).done(function (data, textStatus, jqXHR) {
                console.log('AJAX Done: ' + textStatus);
                console.log(data);
                console.log(this);

                this.constraint.id = data.id;
                this.constraint.date = data.date;
                this.constraint.start = data.start;
                this.constraint.end = data.end;
                this.constraint.num_40hp = data.data['40HP'];
                this.constraint.num_60hp = data.data['60HP'];

                this.hasConstraintData = true;
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            });
        }
    }
});

var vm_create_constraint = new Vue({
    el: '#create_constraint',
    data: {
        date: '',
        num_40hp: '',
        num_60hp: '',
        start_hour: '',
        start_minute: '',
        start_second: '',
        end_hour: '',
        end_minute: '',
        end_second: ''
    },
    methods: {
        createConstraint: function (event) {
            var data = {
                _token: window.Laravel.csrfToken,
                year: this.year,
                month: this.month,
                day: this.day,
                num_40hp: this.num_40hp,
                num_60hp: this.num_60hp,
                start_hour: this.start_hour,
                start_minute: this.start_minute,
                start_second: this.start_second,
                end_hour: this.end_hour,
                end_minute: this.end_minute,
                end_second: this.end_second
            };
            var url = '/json/constraints';

            $.ajax({
                url: url,
                data: data,
                context: this,
                dataType: 'json',
                method: 'POST'
            }).done(function (data, textStatus, jqXHR) {
                console.log('AJAX Done: ' + textStatus);
                console.log(data);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            });
        }
    },
    computed: {
        year: function () {
            var parts = this.date.split('-');
            if (parts.length != 3) {
                return null;
            } else {
                return parts[0];
            }
        },
        month: function () {
            var parts = this.date.split('-');
            if (parts.length != 3) {
                return null;
            } else {
                return parts[1];
            }
        },
        day: function () {
            var parts = this.date.split('-');
            if (parts.length != 3) {
                return null;
            } else {
                return parts[2];
            }
        }
    }
});

var vmCreateConstraints = new Vue({
    el: '#create_constraints',
    data: {
        first: (new Date(Date.now())).toISOString().split('T')[0],
        last: (new Date(Date.now())).toISOString().split('T')[0],
        start: '08:00:00',
        end: '18:00:00',
        num_40hp: 2,
        num_60hp: 2,
        messages: []
    },
    methods: {
        createConstraints: function(event) {
            var url = '/json/constraints/range';
            var data = {
                _token: window.Laravel.csrfToken,
                first: this.first,
                last: this.last,
                start: this.start,
                end: this.end,
                num_40hp: this.num_40hp,
                num_60hp: this.num_60hp
            };

            $.ajax({
                url: url,
                data: data,
                dataType: 'json',
                method: 'POST',
                context: this
            }).done(function (data, textStatus, jqXHR) {
                console.log('AJAX Done: ' + textStatus);
                console.log(data);
                this.messages.push({
                    type: 'success',
                    text: 'Successfully created constraints for date range ' + this.first + ' to ' + this.last
                });
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
                this.messages.push({
                    type: 'error',
                    text: jqXHR.responseJSON.error
                });
            })
        }
    }
});
