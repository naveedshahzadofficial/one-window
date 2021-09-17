<template>
  <header>
    <div class="logo">
      <router-link  exact :to="{ name: 'home' }"><img :src="logo" alt="{{ app_title }}"></router-link>
      <div v-if="!isOnHomePage && totalFavorite" class="saved-permits" :class="[totalFavorite?'favorite-icon':'un-favorite-icon']"><router-link :to="{ name: 'favorite' }"><font-awesome-icon icon="star" />&nbsp;Saved Permits&nbsp;(<span  class="favorite-count" v-text="totalFavorite"></span>)</router-link></div>
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
        }
    },
}
</script>

<style scoped>

</style>
