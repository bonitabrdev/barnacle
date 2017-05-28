<template>
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
</template>
<script>
export default {
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
};
</script>
