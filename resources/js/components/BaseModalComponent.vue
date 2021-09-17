<template>
    <div>
    <div class="modal fade show" tabindex="-1" style="display: block; !important;">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{  title  }}</h5>
                    <button type="button" class="close" @click.prevent="$emit('toggle-modal')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><slot></slot></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click.prevent="$emit('toggle-modal')">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    </div>
</template>

<script>
export default {
    name: "BaseModalComponent",
    props: {
        title:{
            type: String,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
