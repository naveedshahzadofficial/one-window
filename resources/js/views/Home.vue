<template>
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-1 col-md-1"></div>
            <!-- div start for heading -->
            <div class="col-lg-5 col-md-5 text-center">
            <h2 class="main-heading">FACILITATING BUSINESSES</h2>
            <h3 class="sub-heading">WITH A SMARTER, EFFICIENT AND CONVENIENT WAY</h3>
            <h4 class="sub-heading-caption">TO INTERACT WITH GOVERNMENT</h4>
            <!-- description paragraph start -->
            <p class="description text-center my-5">
                eBiz Punjab facilitates you in finding the registrations, permits and licenses you may require for starting your business or running its operations.</p>
            <!-- description paragraph end -->
        </div>
        <div class="col-lg-1 col-md-1"></div>

        <div class="col-lg-4 col-md-4">
            <!-- grid starts for select options -->
                <HomeSearchForm @search-params="searchParams" />
            <!-- grid end for select options  -->
        </div>
        <div class="col-lg-1 col-md-1"></div>
    </div>

</template>

<script>
import HomeSearchForm from "../components/HomeSearchForm";
export default {
    name: "Home.vue",
    components: {HomeSearchForm},
    methods: {
        searchParams: function (params){
            this.$router.push({
                name: "search",
                params: { prop_department_id: params.department_id,prop_business_category_id: params.business_category_id,prop_activity_id: params.activity_id },
            });
        }
    },
}
</script>

<style scoped lang="scss">
</style>
