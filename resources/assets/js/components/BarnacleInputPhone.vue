<template>
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
        updateValue: function (value) {
            value = value.replace(/[^0-9]+/g, '');
            this.$refs.input.value = value;

            this.$emit('input', value);
        }
    }
};
</script>
