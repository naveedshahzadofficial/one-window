<template>
    <div class="wrapping-searching mb-6">
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <RlcoDetailComponent :rlco_detail="getDetailRlco" :isOverFlow="true"/>
            </div>
        </div>
    </div>
</template>

<script>
import RlcoDetailComponent from "../components/RlcoDetailComponent";
export default {
    name: "Detail",
    data() {
        return {
            rlco_detail: {},
            loading: false,
        }
    },
    components: {
        RlcoDetailComponent
    },
    computed: {
      getDetailRlco: function (){
          return this.rlco_detail
      }
    },
    mounted() {
        this.loadRlcoDetail();
    },
    methods: {
        loadRlcoDetail: function(){
            this.loading = true;
            axios.get(`rlco-detail/${this.$route.params.id}`).then(response => {
                this.rlco_detail = response.data.rlco_detail;
                this.loading = false;
            }).catch(error => {
                this.loading = false;
            })
        }
    }

}
</script>

<style scoped>

</style>
