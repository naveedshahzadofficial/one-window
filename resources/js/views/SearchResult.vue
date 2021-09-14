<template>
        <div class="wrapping-searching">
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
                                        <span class="desc-title"><router-link :to="{ name: 'rlco.show', params: { id: rlco.id } }">{{ rlco?.rlco_name }}</router-link></span>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <p class="desc-content">{{ rlco?.purpose }}</p>
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-center">
                                        <router-link class="btn detail-btn" :to="{ name: 'rlco.show', params: { id: rlco.id } }">
                                            View Detail
                                        </router-link>
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
        </div>

</template>

<script>
import SearchForm from "../components/SearchForm";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret, faFolder } from '@fortawesome/free-solid-svg-icons'
library.add(faUserSecret,faFolder)

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
            axios.get('rlcos_search?page=' + page, {
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


.whole-desc-box{
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0px -1px 10px #888;
}
.desc-box{
    padding: 30px;
    border-bottom: 2px solid #888;
}
.desc-title{
    color: #000c60;
    font-weight: bold;
}
.desc-title a {
    color: #000c60;
    text-decoration: none;
}
.desc-content {
    text-align: justify;
}
.detail-btn{
    background-color: #000c60;
    color: white !important;
    margin-top: 0 !important;
    font-size: 12px !important;
}
.search-record{
    display: block !important;
    margin-right: 30px;
    margin-left: 30px;
}
.pagination-row{
    margin-left: 30px !important;
    margin-right: 30px !important;
}


</style>
