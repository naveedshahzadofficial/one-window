<template>

        <h4 class="searching-box-heading" v-text="getActivityName"></h4>
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

            <div v-for="(rlco, index) in filteredList" class="row list-item" :key="rlco.id" :class="[(activeItem == rlco.id) ? 'active':'']"  @click.prevent="$emit('detail-rlco',rlco)">
            <RlcoItemComponent
                @toggle-favorite="$emit('toggle-favorite',rlco)"
                :isFavorite="isFavorite(rlco)"
                :rlco="rlco" />
            </div>



        </div>
</template>

<script>

import RlcoItemComponent from "./RlcoItemComponent";
export default {
    name: "RlcoListComponent",
    components: {RlcoItemComponent},
    props: {
        rlcos: {},
        favorites: {},
        activityName: "",
        activeItem: 0,

    },
    data() {
        return {
            filterSearch: "",
            scopeSort: null,

        }
    },
    mounted() {

    },
    computed: {
        filteredList:function () {
            return  this.rlcos.filter(rlco => {
                return rlco.rlco_name?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                    rlco.purpose?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                    rlco.scope?.toLowerCase().includes(this.filterSearch?.toLowerCase())
            }).sort((a, b) => {
                return this.scopeSort===null?0:(this.scopeSort ?((a?.scope > b?.scope) ? 1 : -1): ((b?.scope > a?.scope) ? 1 : -1));
            });
        },
        getActivityName: function (){
            return this.activityName?this.activityName:"Favorite List";
        }
    },
    methods: {
        toggleSort: function (){
            if(this.scopeSort===null) {
                this.scopeSort = false;
            }else
                this.scopeSort = !this.scopeSort
        },
        isFavorite:function (rlco){
            let items = this.favorites.filter((fav) => fav.id === parseInt(rlco.id));
            return (items.length>0);
        },
    }

}
</script>

<style scoped>

</style>
