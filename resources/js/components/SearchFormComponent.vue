<template>
    <form @submit.prevent="onSubmit" class="search-form">

                <div class="row search-box">
                    <div class="col-lg-4 col-md-4  col-sm-12">
                        <label class="label-field" >Government Agency</label>
                        <div>
                        <Select2 v-model="department_id"  :options="departments" :placeholder="`--- Please Select ---`" />
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4  col-sm-12">
                        <label class="label-field" >Business Sector</label>
                        <br>
                        <Select2 v-model="business_category_id"  :options="businesses" :placeholder="`--- Please Select ---`" />
                    </div>
                    <div class="col-lg-4 col-md-4  col-sm-12">
                        <label class="label-field" >Business Activity</label>
                        <br>
                        <Select2 v-model="activity_id" :options="activities" :placeholder="`--- Please Select ---`" />
                    </div>

                    <div class="col-lg-12 col-md-12  col-sm-12 text-right">
                        <button type="submit" class="btn btn-sm px-5 text-light search-btn" :class="{'btn-loading': isLoading}">Search</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm px-4 text-light search-reset-btn" :class="{'btn-loading': isLoading}" @click.prevent="resetSearch">Reset</button>
                    </div>

                </div>

    </form>
</template>

<script>
export default {
    name: "SearchFormComponent",
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
        isLoading:false,
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
        this.select2focus();
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
        },
        resetSearch: function(){
            this.isLoading = true;

            this.department_id = ""
            this.business_category_id = ""
            this.activity_id = ""

            const newParams = {
                department_id: this.department_id,
                business_category_id: this.business_category_id,
                activity_id: this.activity_id,
            };

            this.$emit('search-params', newParams);

            this.isLoading = false;
        },
        select2focus: function (){
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });
        }
    }
}
</script>

<style scoped>

</style>
