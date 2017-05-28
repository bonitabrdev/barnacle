// js/home.js

import BarnacleInputDate from './components/BarnacleInputDate.vue';
import BarnacleReservationsTable from './components/BarnacleReservationsTable.vue';

new Vue({
    el: '#dashboard',
    data: {
        date: (new Date()).toISOString().split('T')[0],
        tables: null
    },
    components: {
        BarnacleInputDate,
        BarnacleReservationsTable
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
