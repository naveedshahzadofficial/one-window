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
                    <h4 class="searching-box-heading" v-text="activityName"></h4>
                    <div class="business-listing overflow-auto">
                        <div  class="row list-item">
                                <div class="col-lg-9 col-md-9 col-sm-12 pl-0">
                                <span class="list-icon"><font-awesome-icon icon="star" /></span>
                                <span>
                                    <span class="tiny-label">Permit Title</span>
                                    <input type="text" v-model="filterSearch" class="tiny-search-field" placeholder="Filter titles by keyword...">
                                </span>
                                </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                <span class="sorting">
                                    <a href="#" @click.prevent="toggleSort"><span>Scope</span></a>
                                    <span class="triangle-down" v-if="scopeSort!==null && scopeSort"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="triangle-down"><polygon points="5 7 15 7 10 12"></polygon></svg></span>
                                    <span class="triangle-up" v-if="scopeSort!==null && !scopeSort"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="triangle-up"><polygon points="5 13 10 8 15 13"></polygon></svg></span>
                                </span>
                             </div>
                        </div>

                        <div v-for="(rlco, index) in filteredList" class="row list-item" :key="rlco.id" :class="[(activeRlco == rlco.id) ? 'active':'']"  @click.prevent="rlcoDetail(rlco)">
                            <div class="col-lg-9 col-md-9 pl-0 pr-0">
                                <span class="list-icon" :class="[isFavorite(rlco)?'favorite-icon':'un-favorite-icon']" @click.prevent="toggleFavorite(rlco)"><font-awesome-icon icon="star" /></span>
                                <span class="list-heading">{{ rlco.rlco_name }}</span>
                            </div>
                            <div  class="col-lg-3 col-md-3">
                                <span class="list-scop">{{ rlco.scope }}</span>
                            </div>
                            <div  class="col-lg-12 col-md-12">
                                <span class="list-desc">{{ rlco.purpose }}</span>
                            </div>

                        </div>



                    </div>
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
            now: new Date().toISOString(),
            loading: true,
            department_id: "",
            business_category_id: "",
            activity_id: "",
            activeActivity : '0',
            activeRlco : 0,
            totalRlcos: 0,
            filterSearch: "",
            scopeSort: null,
            activityName: "Starting a Business",
            rlcoName: "Business Number Registration",
            favorites: [],
        }
    },
    computed: {
        filteredList:function () {
            return  this.activity_rlcos.filter(rlco => {
                return rlco.rlco_name?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                       rlco.purpose?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                       rlco.scope?.toLowerCase().includes(this.filterSearch?.toLowerCase())
            }).sort((a, b) => {
                return this.scopeSort===null?0:(this.scopeSort ?((a?.scope > b?.scope) ? 1 : -1): ((b?.scope > a?.scope) ? 1 : -1));
            });
        }
    },
    filters: {

    },
    components: {RlcoDetailComponent, SearchFormComponent},
    emits: ['search-params'],
    mounted() {
            this.department_id = this.prop_department_id;
            this.business_category_id = this.prop_business_category_id;
            this.activity_id = this.prop_activity_id;
            this.loadFavoriteItems();
            this.loadActivities();
     },
    methods: {
        loadFavoriteItems: function(){
            if (localStorage.getItem('favorites')) {
                try {
                    this.favorites = JSON.parse(localStorage.getItem('favorites'));
                } catch(e) {
                    localStorage.removeItem('favorites');
                }
            }
        },
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
           this.rlco_detail = rlco;
        },
         toggleSort: function (){
            if(this.scopeSort===null) {
                this.scopeSort = false;
            }else
            this.scopeSort = !this.scopeSort
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
         isFavorite:function (rlco){
            let items = this.favorites.filter((fav) => fav.id === parseInt(rlco.id));
            return items.length;
        },
         toggleFavorite: function (rlco){
            if(this.isFavorite(rlco))
            this.favorites = this.favorites.filter((fav) => fav.id !== parseInt(rlco.id));
            else
            this.favorites.push(rlco);
            const parsedFavorites = JSON.stringify(this.favorites);
            localStorage.setItem('favorites', parsedFavorites);
            this.$emit('toggle-favorite', this.favorites.length);
        }

    },

}
</script>

<style scoped>

</style>
