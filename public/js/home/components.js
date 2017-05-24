// js/home/components.js

Vue.component('barnacle-input-date', {
    template: `
        <div class="form-group">
            <label v-if="$slots.hasOwnProperty('default')"><slot></slot></label>
            <input
                type="date"
                class="form-control"
                v-bind:value="value"
                v-on:input="updateValue($event.target.value)"
                v-bind:disabled="disabled" />
            <div
                v-if="errors.length > 0"
                class="alert alert-danger"
                v-for="error in errors">{{ error }}</div>
        </div>
    `,
    props: {
        value: null,
        errors: {
            type: Array,
            default: function () {
                return [];
            }
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        updateValue: function(value) {
            this.$emit('input', value);
        }
    }
});

Vue.component('barnacle-reservations-table', {
    template: `
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
    `,
    props: {
        table: {
            type: Array,
            required: true
        }
    }
});

Vue.component('barnacle-reservations-table-row', {
    template: `
        <div style="width:100%; height:60px">
            <barnacle-reservations-table-slot
                v-for="slot in row"
                v-bind:slotdata="slot"
                v-bind:minutes="minutes"></barnacle-reservations-table-slot>
        </div>
    `,
    props: {
        minutes: {
            type: Number,
            required: true
        },
        row: {
            type: Array,
            required: true
        }
    }
});

Vue.component('barnacle-reservations-table-slot', {
    template: `
        <div v-bind:style="styleObject" v-bind:class="classObject">
            <template v-if="slotdata.reservation !== null">
                <div style="width:100%; height:50%; text-align:center">
                    {{ slotdata.reservation.start }}-{{ slotdata.reservation.end }}
                </div>
                <div style="width:100%; height:50%; text-align:center">
                    <strong>{{ slotdata.reservation.customer.last_name }}</strong>
                </div>
            </template>
        </div>
    `,
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
});
