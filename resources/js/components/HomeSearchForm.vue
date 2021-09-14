<template>
    <form @submit.prevent="onSubmit" class="search-form">
        <div class="row">
                    <div class="col-lg-12 col-md-12  col-sm-12">
                        <label class="label-field" :for="department_id">Department</label>
                        <br>
                        <Select2 v-model="department_id" :options="departments" :placeholder="`--- Please Select ---`" />

                    </div>
                    <div class="col-lg-12 col-md-12  col-sm-12 my-3">
                        <label class="label-field" :for="business_category_id">Business</label>
                        <br>
                        <Select2 v-model="business_category_id" :options="businesses" :placeholder="`--- Please Select ---`" />
                    </div>
                    <div class="col-lg-12 col-md-12  col-sm-12">
                        <label class="label-field" :for="activity_id">Activity</label>
                        <br>
                        <Select2 v-model="activity_id" :options="activities" :placeholder="`--- Please Select ---`" />
                    </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                <button type="submit" class="btn home-search-btn btn-sm px-5 text-light" :class="{'btn-loading': isLoading}">Search</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "HomeSearchForm",
    props: {
        department_id: "",
        business_category_id: "",
        activity_id: "",
    },
    data(){
        return {
            isLoading:false
        }},
    computed: {
        departments() {
            return this.$store.state.department.departments;
        },
        businesses() {
            return this.$store.state.business.businesses;
        },
        activities() {
            return this.$store.state.activity.activities;
        },
    },
    mounted() {
        this.$store.dispatch('department/getDepartment');
        this.$store.dispatch('business/getBusiness');
        this.$store.dispatch('activity/getActivity');
    },
    methods:{
        onSubmit: function (){
            this.isLoading = true;
            const newParams = {
                department_id: this.department_id,
                business_category_id: this.business_category_id,
                activity_id: this.activity_id,
            };
            this.$emit('search-params', newParams);
            this.isLoading = false;
        }
    }
}
</script>

<style scoped>

</style>
