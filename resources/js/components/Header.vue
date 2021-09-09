<template>
  <header>
    <div class="logo">
      <router-link  exact :to="{ name: 'home' }"><img src="/frontend/Inner-Logo.png" alt="{{ app_title }}"></router-link>
    </div>
  </header>
</template>

<script>
export default {
    name: "Header",
    data() {
    return {
      app_title: this.$store.state.app_title
    }
  },
}
</script>

<style scoped>

</style>
