<template>
        <SearchForm :prop_department_id="prop_department_id" :prop_business_category_id="prop_business_category_id" :prop_activity_id="prop_activity_id" @search-params="searchParams" />

        <div class="row">
                        <div class="col-md-12 my-3 col-sm-12">
                            <span style="margin-left: 30px; color: #000c60;">Search Results</span>
                            <br>
                            <span style="margin-left: 30px; font-size: 12px;">{{ records }}&nbsp;{{ records>1?'results':'result'}} found.</span>
                        </div>
         </div>

          <div class="row my-3 search-record" :class="{'loading': loading}">
                    <div class="whole-desc-box">

                        <div v-for="(rlco, index) in rlcos" :key="index" class="desc-box" >
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <span class="desc-title"><a target="_blank" href="#">{{ rlco?.rlco_name }}</a></span>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <p class="desc-content">{{ rlco?.purpose }}</p>
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-center">
                                        <a target="_blank" href="#" class="btn detail-btn">View Detail</a>
                                    </div>
                                </div>
                        </div>

                        <p class="text-center" v-show="!rlcos.length > 0">No matching result was found.</p>

                    </div>
          </div>

           <div class="row pagination-row" v-show="rlcos.length && records>30">
            <div class="col-md-2 col-sm-12 mt-3">
                <pagination v-model="page" :records="records" :per-page="per_page" @paginate="loadRlcos" />
            </div>
        </div>


</template>

<script>
import SearchForm from "../components/SearchForm";

export default {
    name: "SearchResult",
    props:{
        prop_department_id: "",
        prop_business_category_id: "",
        prop_activity_id: ""
    },
    data() {
        return {
            rlcos: [],
            now: new Date().toISOString(),
            page: 1,
            records: 0,
            per_page: 0,
            loading: true,
            department_id: "",
            business_category_id: "",
            activity_id: "",
        }
    },
    components: {SearchForm},
     mounted() {
            this.department_id = this.prop_department_id;
            this.business_category_id = this.prop_business_category_id;
            this.activity_id = this.prop_activity_id;
            this.loadRlcos();
     },
    methods: {
        searchParams: function (params){
            this.department_id = params.department_id;
            this.business_category_id = params.business_category_id;
            this.activity_id = params.activity_id;
            this.loadRlcos();
        },
       loadRlcos(page = this.page) {
            this.loading = true;
            axios.get('/api/v1/rlcos_search?page=' + page, {
                params: {
                    department_id: this.department_id,
                    business_category_id: this.business_category_id,
                    activity_id: this.activity_id,
                }
            }).then(response => {
                this.records = response.data.rlcos_count
                this.per_page = response.data.paginate
                this.rlcos = response.data.rlcos.data;
                this.loading = false;
            })
        },
    },

}
</script>

<style scoped>

</style>
