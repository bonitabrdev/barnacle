<template>
    <div class="form-group">
        <label v-if="$slots.hasOwnProperty('default')"><slot></slot></label>
        <input
            ref="input"
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
</template>
<script>
export default {
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
            // check if seconds are missing, if so, add them
            if (value.split(':').length < 3) {
                value += ':00';
                this.$refs.input.value = value;
            }

            this.$emit('input', value);
        }
    }
};
</script>
