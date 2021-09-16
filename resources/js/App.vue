<template>
    <div class="container-fluid">
        <Header :totalFavorite="totalFavorite" />
        <div class="content-wrap mb-4" >
            <router-view @toggle-favorite="toggleFavorite"></router-view>
        </div>
    </div>
    <Footer />
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
export default {
    name: "App",
    components: {Footer, Header},
    data() {
        return {
        totalFavorite: 0
        }
    },
    mounted() {
        this.favoriteCount();
    },
    methods: {
        toggleFavorite: function (total){
            this.totalFavorite = total;
        },
        favoriteCount: function (){
            if (localStorage.getItem('favorites')) {
                try {
                    let favorites = JSON.parse(localStorage.getItem('favorites'));
                    this.totalFavorite = favorites.length;
                } catch(e) {
                    localStorage.removeItem('favorites');
                }
            }
        }
    }
}
</script>

<style>

</style>
