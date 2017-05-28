// js/admin/constraints/create.js

export default new Vue({
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
