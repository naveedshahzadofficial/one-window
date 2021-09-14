<template>
    <footer class="main-footer footer-overlay">

                <div class="row row-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 footer text-center">
                        <router-link  :to="{ name: 'Overview' }">Overview</router-link>
                        <a target="_blank" href="https://business.punjab.gov.pk">Starting a business</a>
                        <a target="_blank" href="https://eodbpunjab.com">EoDB Punjab</a>
                        <a target="_blank" href="https://invest.gov.pk/eodb">EoDB Pakistan</a>
                    </div>
                </div>

                    <div class="row mt-4 row-block">
                        <div class="col-lg-6 col-md-6 col-sm-12">
							<span class="nowrap footer2">&copy; Automation of Business Regulations, Government of
								Punjab</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                            <div class="nowrap1 footer2 ">Powered By: Punjab Information Technology Board</div>
                        </div>
                    </div>
    </footer>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>

</style>
