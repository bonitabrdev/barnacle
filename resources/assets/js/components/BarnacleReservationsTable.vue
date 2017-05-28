<template>
    <div class="row">
        <div class="col-md-1">
            <slot></slot>
        </div>
        <div class="col-md-11">
            <div class="row" v-for="row in table">
                <div class="col-md-12">
                    <barnacle-reservations-table-row
                        v-bind:minutes="row.minutes"
                        v-bind:row="row.slots"></barnacle-reservations-table-row>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import BarnacleReservationsTableRow from './BarnacleReservationsTableRow.vue';

export default {
    props: {
        table: {
            type: Array,
            required: true
        }
    },
    components: {
        BarnacleReservationsTableRow
    }
};
</script>
