<template>
    <div class="col-lg-9 col-md-9 pl-0 pr-0">
        <span class="list-icon" :class="[isFavorite?'favorite-icon':'un-favorite-icon']" @click.prevent="$emit('toggle-favorite',rlco)"><font-awesome-icon icon="star" /></span>
        <span class="list-heading">{{ rlco.rlco_name }}</span>
    </div>
    <div  class="col-lg-3 col-md-3">
        <span class="list-scop">{{ rlco.scope }}</span>
    </div>
    <div  class="col-lg-12 col-md-12">
        <span class="list-desc">{{ rlco.purpose }}</span>
    </div>
</template>

<script>
export default {
    name: "RlcoItemComponent",
    props: {
        rlco: Object,
        isFavorite: false
    }
}
</script>

<style scoped>

</style>
