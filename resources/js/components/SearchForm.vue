<template>
    <form @submit.prevent="onSubmit" class="search-form">

                <div class="row search-box">
                    <div class="col-md-3  col-sm-12">
                        <label class="lable fw-bold" :for="department_id">Department</label>
                        <br>
                        <Select2 v-model="department_id" :options="departments" :placeholder="`--- Please Select ---`" />

                    </div>
                    <div class="col-md-3  col-sm-12">
                        <label class="lable fw-bold" :for="business_category_id">Business</label>
                        <br>
                        <Select2 v-model="business_category_id" :options="businesses" :placeholder="`--- Please Select ---`" />
                    </div>
                    <div class="col-md-3  col-sm-12">
                        <label class="lable fw-bold" :for="activity_id">Activity</label>
                        <br>
                        <Select2 v-model="activity_id" :options="activities" :placeholder="`--- Please Select ---`" />
                    </div>
                     <div class="col-md-3  col-sm-12">
                        <button type="button" class="btn btn-sm px-4 text-light search-reset-btn" @click.prevent="resetSearch">Reset</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-sm px-5 text-light search-btn">Search</button>
                    </div>
                </div>
       
    </form>
</template>

<script>
export default {
    name: "SearchForm",
    props: {
        prop_department_id: "",
        prop_business_category_id: "",
        prop_activity_id: "",
    },
    data() {
      return {
        department_id: "",
        business_category_id: "",
        activity_id: "",
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

        this.department_id = this.prop_department_id;
        this.business_category_id = this.prop_business_category_id;
        this.activity_id = this.prop_activity_id;
    },
    methods:{
        onSubmit: function (){
            const newParams = {
                department_id: this.department_id,
                business_category_id: this.business_category_id,
                activity_id: this.activity_id,
            };
            this.$emit('search-params', newParams);
        },
        resetSearch: function(){

            this.department_id = ""
            this.business_category_id = ""
            this.activity_id = ""

            const newParams = {
                department_id: this.department_id,
                business_category_id: this.business_category_id,
                activity_id: this.activity_id,
            };

            this.$emit('search-params', newParams);
        }
    }
}
</script>

<style scoped>

</style>
