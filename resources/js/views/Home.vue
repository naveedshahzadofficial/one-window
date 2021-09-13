<template>

    <!-- div start for heading -->
    <div class="heading text-center">
        <p> FIND THE PERMITS AND LICENCS YOU NEED TO YOUR BUSINESS.</p>
    </div>
    <!-- div end for heading -->

    <!-- description paragraph start -->
    <p class="description text-center">Facilitating Businesses with a smarter, efficient and convenient way to interact with Government. <br>
        Biz Punjab facilitates you in finding the registrations, permits and licenses <br>you may require for starting your business or running its operations.</p>
    <!-- description paragraph end -->

    <!-- grid starts for select options -->
    <div class="my-5">
        <HomeSearchForm @search-params="searchParams" />
    </div>
    <!-- grid end for select options  -->

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

<style scoped>

</style>
