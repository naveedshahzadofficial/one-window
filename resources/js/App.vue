<template>
    <div class="page-background container-fluid">
        <Header />
        <div class="content-wrap mb-5" >
            <router-view></router-view>
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
export default {
    name: "App",
    components: {Footer, Header}
}
</script>

<style>

</style>
