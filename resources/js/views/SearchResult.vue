<template>
        <div class="wrapping-searching">
        <SearchFormComponent :prop_department_id="prop_department_id" :prop_business_category_id="prop_business_category_id" :prop_activity_id="prop_activity_id" @search-params="searchParams" />

            <div class="row mt-3">

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h4 class="searching-box-heading">Browse by Activity</h4>
                    <div class="activities-listing overflow-auto">

                        <div v-for="(activity, index) in activities" class="row list-item" :key="activity.id" :class="[(activeActivity == activity.id) ? 'active':'']" @click.prevent="findRlcos(activity)">
                            <div class="col-lg-10 col-md-10">
                                <span class="list-icon"><font-awesome-icon icon="folder" /></span>
                                <div class="list-title">{{ activity.activity_name }}</div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="list-count">{{ activity.rlcos_count }}</span>
                            </div>
                        </div>


                        <div  class="row list-item " :class="[(activeActivity == 'all') ? 'active':'']" @click.prevent="allActivites">
                            <div class="col-lg-10 col-md-10">
                                <span class="list-icon"><font-awesome-icon icon="folder" /></span>
                                <div class="list-title">All Activities</div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="list-count">{{ totalRlcos }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 pl-0 pr-0">
                    <RlcoListComponent
                        :activity-name="getActivityName"
                        :rlcos="loadRlcos"
                        :activeItem="activeItem"
                        @toggle-favorite="$emit('toggle-favorite')"
                        @detail-rlco="rlcoDetail"/>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12">
                <RlcoDetailComponent :rlco_detail="rlco_detail"/>
                </div>

            </div>

        </div>

</template>

<script>
import SearchFormComponent from "../components/SearchFormComponent";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faStar, faFolder, faDownload } from '@fortawesome/free-solid-svg-icons'
import RlcoListComponent from "../components/RlcoListComponent";
import RlcoDetailComponent from "../components/RlcoDetailComponent";

library.add(faStar,faFolder, faDownload)

export default {
    name: "SearchResult",
    props:{
        prop_department_id: "",
        prop_business_category_id: "",
        prop_activity_id: ""
    },
    data() {
        return {
            activities: [],
            rlcos: [],
            activity_rlcos: [],
            rlco_detail: {},
            loading: true,
            department_id: "",
            business_category_id: "",
            activity_id: "",
            activeActivity : '0',
            activeRlco : 0,
            totalRlcos: 0,
            activityName: "Starting a Business",
            rlcoName: "Business Number Registration",
            activeItem: 0,
        }
    },
    computed: {
        loadRlcos: function (){
            return this.activity_rlcos;
        },
        getActivityName: function (){
            return this.activityName;
        }
    },
    filters: {

    },
    components: {RlcoListComponent, RlcoDetailComponent, SearchFormComponent},
    emits: ['search-params','toggle-favorite'],
    mounted() {
            this.department_id = this.prop_department_id;
            this.business_category_id = this.prop_business_category_id;
            this.activity_id = this.prop_activity_id;
            this.loadActivities();
     },
    methods: {
        searchParams: function (params){
            this.department_id = params.department_id;
            this.business_category_id = params.business_category_id;
            this.activity_id = params.activity_id;
            this.loadActivities();
        },
         loadActivities: function () {
            this.loading = true;
            axios.get('rlcos_search', {
                params: {
                    department_id: this.department_id,
                    business_category_id: this.business_category_id,
                    activity_id: this.activity_id,
                }
            }).then(response => {
                this.rlco_detail = {};
                this.activity_rlcos = [];
                this.activities = response.data.activities;
                this.totalRlcos = response.data.total_rlcos;
                this.rlcos = response.data.rlcos;
                let activity = _.head(this.activities);
                if(activity!==undefined) {
                    this.findRlcos(activity);
                }
                this.loading = false;
            })
        },
         findRlcos: function (activity){
             this.activeActivity = activity.id;
             this.activityName = activity.activity_name;
             this.activity_rlcos = this.rlcos.filter((rlco) => rlco.activity_id === parseInt(activity.id));
             let rlco = _.head(this.activity_rlcos);
             if(rlco!==undefined) {
                 this.rlcoDetail(rlco);
             }
         },
         rlcoDetail: function (rlco){
           this.activeRlco = rlco.id;
           this.activeItem = rlco.id;
           this.rlco_detail = rlco;
        },
         allActivites: function(){
             this.activity_rlcos = this.rlcos;
             this.activeActivity='all';
             this.activityName = 'All Activities';
             let rlco = _.head(this.activity_rlcos);
             if(rlco!==undefined) {
                 this.rlcoDetail(rlco);
             }
         },

    },

}
</script>

<style scoped>

</style>
