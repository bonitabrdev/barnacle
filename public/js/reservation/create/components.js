// js/reservation/create/components.js

Vue.component('barnacle-input-text', {
    template: `
        <div class="form-group">
            <label><slot></slot></label>
            <input
                type="text"
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

Vue.component('barnacle-input-phone', {
    template: `
        <div class="form-group">
            <label><slot></slot></label>
            <input
                ref="input"
                type="text"
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
        updateValue: function (value) {
            value = value.replace(/[^0-9]+/g, '');
            this.$refs.input.value = value;

            this.$emit('input', value);
        }
    }
});

Vue.component('barnacle-input-time', {
    template: `
        <div class="form-group">
            <label><slot></slot></label>
            <input
                type="time"
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

Vue.component('barnacle-input-date', {
    template: `
        <div class="form-group">
            <label><slot></slot></label>
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

Vue.component('barnacle-modal', {
    template: `
        <div class="modal" ref="modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" v-on:click="closeClicked">&times;</button>
                        <h4 class="modal-title">{{ title }}</h4>
                    </div>
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    `,
    props: {
        show: {
            type: Boolean,
            required: true
        },
        title: {
            type: String,
            required: true
        }
    },
    methods: {
        closeClicked: function(event) {
            this.$emit('close');
        }
    },
    mounted: function () {
        $(this.$refs.modal).modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
    },
    watch: {
        show: function(newShow) {
            if (newShow) {
                $(this.$refs.modal).modal('show');
            } else {
                $(this.$refs.modal).modal('hide');
            }
        }
    }
});

Vue.component('barnacle-warnings', {
    template: `
        <div class="row" v-if="warnings.length > 0">
            <div class="col-md-offset-1 col-md-10">
                <div v-for="(warning, index) in warnings" class="alert alert-danger">
                    <button type="button" class="close" v-on:click="dismissWarning(index)">&times;</button>
                    {{ warning }}
                </div>
            </div>
        </div>
    `,
    props: {
        warnings: {
            type: Array,
            required: true
        }
    },
    methods: {
        dismissWarning: function (index) {
            this.$emit('dismiss', {index: index});
        }
    }
});
