<template>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column flex-root ml-30">
            <span class="font-weight-bolder mb-2">Department Name</span>
            <span
                class="opacity-70">{{ rlco.department?.department_name }}</span>
        </div>

        <div class="d-flex flex-column flex-root mr-30">
            <span class="font-weight-bolder mb-2">RLCOs Name</span>
            <span class="opacity-70">{{ rlco.rlco_name }}</span>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: "RlcoDetail",
    data() {
        return {
            rlco: {}
        }
    },
    created() {
        this.loadRlco()
    },
    methods: {
        loadRlco() {
            axios.get(`rlco/${this.$route.params.id}`).then(response => {
                this.rlco = response.data.rlco
            })
        }
    }
}
</script>

<style scoped>

</style>
