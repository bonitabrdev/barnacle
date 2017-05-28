<template>
    <div class="row" v-if="warnings.length > 0">
        <div class="col-md-offset-1 col-md-10">
            <div v-for="(warning, index) in warnings" class="alert alert-danger">
                <button type="button" class="close" v-on:click="dismissWarning(index)">&times;</button>
                {{ warning }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
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
};
</script>
