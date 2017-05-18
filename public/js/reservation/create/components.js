// js/reservation/create/components.js

Vue.component('barnacle-input-text', {
    template: `
        <div class="form-group">
            <label><slot></slot></label>
            <input
                type="text"
                class="form-control"
                v-bind:value="value"
                v-on:input="updateValue($event.target.value)" />
            <div
                v-if="errors.has(name)"
                class="alert alert-danger"
                v-for="error in errors.get(name)">{{ error }}</div>
        </div>
    `,
    props: [
        'value',
        'errors',
        'name'
    ],
    methods: {
        updateValue: function(value) {
            this.errors.clear(this.name);

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
                v-on:input="updateValue($event.target.value)" />
            <div
                v-if="errors.has(name)"
                class="alert alert-danger"
                v-for="error in errors.get(name)">{{ error }}</div>
        </div>
    `,
    props: [
        'value',
        'errors',
        'name'
    ],
    methods: {
        updateValue: function (value) {
            value = value.replace(/[^0-9]+/g, '');
            this.$refs.input.value = value;

            this.errors.clear(this.name);

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
                v-on:input="updateValue($event.target.value)" />
            <div
                v-if="errors.has(name)"
                class="alert alert-danger"
                v-for="error in errors.get(name)">{{ error }}</div>
        </div>
    `,
    props: [
        'value',
        'errors',
        'name'
    ],
    methods: {
        updateValue: function(value) {
            this.errors.clear(this.name);

            this.$emit('input', value);
        }
    }
});

Vue.component('barnacle-modal', {
    template: `
        <div class="modal" ref="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" v-on:click="closeClicked">&times;</button>
                        <h4 class="modal-title">{{ title }}</h4>
                    </div>
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" v-on:click="closeClicked">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="okClicked">OK</button>
                    </div>
                </div>
            </div>
        </div>
    `,
    props: [
        'show',
        'title'
    ],
    methods: {
        closeClicked: function(event) {
            this.$emit('close');
        },
        okClicked: function(event) {
            this.$emit('ok');
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
