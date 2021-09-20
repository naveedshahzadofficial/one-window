<template>
    <div class="wrapping-searching">
    <div class="row mt-3">

        <div class="col-lg-6 col-md-6 col-sm-12">
        <RlcoListComponent
            :rlcos="rlcos"
            :activeItem="activeItem"
            @toggle-favorite="$emit('toggle-favorite')"
            @detail-rlco="rlcoDetail"/>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
        <RlcoDetailComponent :rlco_detail="rlco_detail"/>
         </div>
    </div>
    </div>
</template>

<script>
import RlcoDetailComponent from "../components/RlcoDetailComponent";
import RlcoListComponent from "../components/RlcoListComponent";
export default {
    name: "Favorite",
    components: {RlcoListComponent, RlcoDetailComponent},
    data() {
        return {
            rlcos: [],
            rlco_detail: {},
            activeItem: 0,
        }
    },
    mounted() {
        this.loadFavoriteItems();
        let rlco = _.head(this.rlcos);
        if(rlco!==undefined) {
            this.rlcoDetail(rlco);
        }
    },
    methods: {
        loadFavoriteItems: function () {
            if (localStorage.getItem('favorites')) {
                try {
                    this.rlcos = JSON.parse(localStorage.getItem('favorites'));
                } catch (e) {
                    localStorage.removeItem('favorites');
                }
            }
        },
        rlcoDetail: function (rlco){
            this.activeItem = rlco.id;
            this.rlco_detail = rlco;
        },
        toggleFavorite: function (total){
            this.$emit('toggle-favorite',total);
            this.loadFavoriteItems();
        }
    }

}
</script>

<style scoped>

</style>
