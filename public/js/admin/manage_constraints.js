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
            constrained_date: '',
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
            this.constraint.constrained_date = '';
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
                this.constraint.constrained_date = data.constrained_date;
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
