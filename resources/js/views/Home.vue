<template>

    <!-- div start for heading -->
    <div class="heading text-center">
        <p> FIND THE PERMITS AND LICENCS YOU NEED TO YOUR BUSINESS.</p>
    </div>
    <!-- div end for heading -->

    <!-- description paragraph start -->
    <p class="description text-center">BizPal helps you find the permits and licencs you may require whrn
        starting
        and/or operating<br>
        your business. Filter permits based on your location, industry and business activities and save <br>
        the ones that apply to your situation.</p>
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
