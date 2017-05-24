// js/home/index.js

vmDashboard = new Vue({
    el: '#dashboard',
    data: {
        date: (new Date()).toISOString().split('T')[0],
        tables: null
    },
    mounted: function () {
        this.fetchTables();
    },
    methods: {
        fetchTables: function () {
            axios.get('/json/reservations/table/' + this.date)
                .then(response => {
                    console.log(response.data);
                    this.tables = response.data;
                }).catch(error => {
                    console.log(error.response);
                });
        }
    }
});
