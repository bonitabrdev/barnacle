// js/admin/constraints/show.js

export default new Vue({
    el: '#show_constraints',
    data: {
        first: (new Date(Date.now())).toISOString().split('T')[0],
        last: (new Date(Date.now())).toISOString().split('T')[0],
        constraints: []
    },
    methods: {
        showConstraints: function (event) {
            var url = '/json/constraints/range/' + this.first + '/' + this.last;

            $.ajax({
                context: this,
                url: url,
                dataType: 'json',
                method: 'GET'
            }).done(function (data, textStatus, jqXHR) {
                console.log('AJAX Done: ' + textStatus);
                console.log(data);

                this.constraints = data.constraints;
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            });
        },
        clearConstraints: function(event) {
            this.constraints = [];
        }
    }
});
