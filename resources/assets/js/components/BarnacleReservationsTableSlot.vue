<template>
    <div v-bind:style="styleObject" v-bind:class="classObject">
        <template v-if="slotdata.reservation !== null">
            <div style="width:100%; height:50%; text-align:center">
                {{ slotdata.reservation.start }}-{{ slotdata.reservation.end }}
            </div>
            <div style="width:100%; height:50%; text-align:center">
                <strong>
                    <a style="text-decoration:none;" v-bind:href="'/reservations/' + slotdata.reservation.id">
                        {{ slotdata.reservation.customer.last_name }}
                    </a> - {{ slotdata.reservation.num_people }}
                </strong>
            </div>
        </template>
    </div>
</template>
<script>
export default {
    props: {
        minutes: {
            type: Number,
            required: true
        },
        slotdata: {
            type: Object,
            required: true
        }
    },
    computed: {
        styleObject: function () {
            return {
                float: 'left',
                height: '100%',
                width: (this.slotdata.minutes / this.minutes * 100) + '%',
                'border-left': '1px solid',
                'border-right': '1px solid'
            };
        },
        classObject: function () {
            return {
                'bg-info': this.slotdata.reservation !== null,
                'bg-warning': this.slotdata.reservation === null
            };
        }
    }
};
</script>
