<template>
  <header>
    <div class="logo">
      <router-link  exact :to="{ name: 'home' }"><img :src="logo" alt="{{ app_title }}"></router-link>
      <div v-if="!isOnHomePage" class="saved-permits" :class="[favoriteCount?'favorite-icon':'un-favorite-icon']"><router-link :to="{ name: 'favorite' }"><font-awesome-icon icon="star" />&nbsp;Saved Permits<span v-if="favoriteCount">&nbsp;(<span  class="favorite-count" v-text="favoriteCount"></span>)</span></router-link></div>
    </div>
  </header>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faStar } from '@fortawesome/free-solid-svg-icons'
library.add(faStar)
export default {
    name: "Header",
    data() {
    return {
      app_title: this.$store.state.app_title,
      logo: process.env.MIX_BASE_URL+ '/media/logo-blue.png'
    }
  },
    computed: {
        favoriteCount: function (){
            let count = 0;
            if (localStorage.getItem('favorites')) {
                try {
                    let favorites = JSON.parse(localStorage.getItem('favorites'));
                    count = favorites.length;
                } catch(e) {
                    localStorage.removeItem('favorites');
                }
            }
            return count;
        }
    },
    methods: {
    isOnHomePage: function() {
        console.log(this.$route.path);
        return this.$route.path === '/' || this.$route.path === '/rlcos/'
    }
    }
}
</script>

<style scoped>

</style>
