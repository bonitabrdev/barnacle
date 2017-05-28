<template>
    <div style="width:100%; height:60px">
        <barnacle-reservations-table-slot
            v-for="(slot, index) in row"
            v-bind:slotdata="slot"
            v-bind:minutes="minutes"
            v-bind:key="index"></barnacle-reservations-table-slot>
    </div>
</template>
<script>
import BarnacleReservationsTableSlot from './BarnacleReservationsTableSlot.vue';

export default {
    props: {
        minutes: {
            type: Number,
            required: true
        },
        row: {
            type: Array,
            required: true
        }
    },
    components: {
        BarnacleReservationsTableSlot
    }
};
</script>
