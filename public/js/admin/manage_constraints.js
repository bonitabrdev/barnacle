// js/admin/manage_constraints.js

(function ($) {
    $(document).ready(function () {
        $('#view_current_constraints_date').datepicker({
            dateFormat: 'yy-mm-dd'
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
            var url = '/json/constraints/date/' + $('#view_current_constraints_date').val();

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
