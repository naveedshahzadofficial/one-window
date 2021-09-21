<template>
  <header>
    <div class="logo row">
        <div class="col-lg-9 col-md-9 col-sm-12 pl-0">
            <router-link  exact :to="{ name: 'home' }"><img :src="logo" alt="{{ app_title }}"></router-link>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 text-right pt-5">
            <span v-if="!isOnHomePage && totalFavorite" class="saved-permits" :class="[totalFavorite?'favorite-icon':'un-favorite-icon']">
                <router-link :to="{ name: 'favorite' }"><font-awesome-icon icon="star" />&nbsp;Saved Permits&nbsp;(<span  class="favorite-count" v-text="totalFavorite"></span>)
                </router-link>
            </span>
            <span class="saved-back-link" v-if="isSavedPage">
                <router-link  :to="{ name: 'search' }">Back</router-link>
            </span>
        </div>
    </div>
  </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    props: {
        totalFavorite: 0
    },
    data() {
    return {
      app_title: this.$store.state.app_title,
      logo: process.env.MIX_BASE_URL+ '/media/logo-blue.png'
    }
  },
    computed: {
        isOnHomePage: function() {
            return this.$route.path === '/' || this.$route.path === '/rlcos/'
        },
        isSavedPage: function() {
            return this.$route.path === '/rlcos/saved' || this.$route.path === '/saved'
        }
    },
}
</script>

<style scoped>

</style>
