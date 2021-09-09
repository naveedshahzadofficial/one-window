<template>
  <header>
    <div class="logo">
      <router-link  exact :to="{ name: 'home' }"><img :src="logo" alt="{{ app_title }}"></router-link>
    </div>
  </header>
</template>

<script>
export default {
    name: "Header",
    data() {
    return {
      app_title: this.$store.state.app_title,
      logo: process.env.MIX_BASE_URL+ '/frontend/Inner-Logo.png'
    }
  },
}
</script>

<style scoped>

</style>
