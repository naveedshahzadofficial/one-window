<template>
        <div class="wrapping-searching">
        <SearchForm :prop_department_id="prop_department_id" :prop_business_category_id="prop_business_category_id" :prop_activity_id="prop_activity_id" @search-params="searchParams" />

            <div class="row mt-3">

                <div class="col-lg-3">
                    <h4 class="searching-box-heading">Browse by Activity</h4>
                    <div class="activities-listing overflow-auto">

                        <div v-for="(activity, index) in activities" class="row list-item" :key="activity.id" :class="[(activeActivity == activity.id) ? 'active':'']" @click.prevent="findRlcos(activity)">
                            <div class="col-lg-10 col-md-10">
                                <span class="list-icon"><font-awesome-icon icon="folder" /></span>
                                <div class="list-title">{{ activity.activity_name }}</div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="list-count">{{ activity.rlcos_count }}</span>
                            </div>
                        </div>


                        <div  class="row list-item " :class="[(activeActivity == 'all') ? 'active':'']" @click.prevent="allActivites">
                            <div class="col-lg-10 col-md-10">
                                <span class="list-icon"><font-awesome-icon icon="folder" /></span>
                                <div class="list-title">All Activities</div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="list-count">{{ totalRlcos }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 pl-0 pr-0">
                    <h4 class="searching-box-heading" v-text="activityName"></h4>
                    <div class="business-listing overflow-auto">
                        <div  class="row list-item">
                                <div class="col-lg-9 col-md-9 col-sm-12 pl-0">
                                <span class="list-icon"><font-awesome-icon icon="star" /></span>
                                <span>
                                    <span class="tiny-label">Permit Title</span>
                                    <input type="text" v-model="filterSearch" class="tiny-search-field" placeholder="Filter titles by keyword...">
                                </span>
                                </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                <span class="sorting">
                                    <a href="#" @click.prevent="toggleSort"><span>Scope</span></a>
                                    <span class="triangle-down" v-if="scopeSort!==null && scopeSort"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="triangle-down"><polygon points="5 7 15 7 10 12"></polygon></svg></span>
                                    <span class="triangle-up" v-if="scopeSort!==null && !scopeSort"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="triangle-up"><polygon points="5 13 10 8 15 13"></polygon></svg></span>
                                </span>
                             </div>
                        </div>

                        <div v-for="(rlco, index) in filteredList" class="row list-item" :key="rlco.id" :class="[(activeRlco == rlco.id) ? 'active':'']"  @click.prevent="rlcoDetail(rlco)">
                            <div class="col-lg-9 col-md-9 pl-0 pr-0">
                                <span class="list-icon" :class="[isFavorite(rlco)?'favorite-icon':'un-favorite-icon']" @click.prevent="toggleFavorite(rlco)"><font-awesome-icon icon="star" /></span>
                                <span class="list-heading">{{ rlco.rlco_name }}</span>
                            </div>
                            <div  class="col-lg-3 col-md-3">
                                <span class="list-scop">{{ rlco.scope }}</span>
                            </div>
                            <div  class="col-lg-12 col-md-12">
                                <span class="list-desc">{{ rlco.purpose }}</span>
                            </div>

                        </div>



                    </div>
                </div>

                <div class="col-lg-5">
                    <h4 class="searching-box-heading" v-text="rlcoName"></h4>
                    <div class="business-detail overflow-auto">
                        <div v-if="rlco_detail && rlco_detail.id" class="col-lg-12 col-md-12 list-detail">
                            <div class="row">
                            <div class="col-lg-9 col-md-9"><span class="detail-department">{{ rlco_detail.department?.department_name }}</span></div>
                            <div class="col-lg-3 col-md-3"><span class="detail-scope">{{ rlco_detail.scope }}</span></div>
                            </div>

                            <div class="detail-desc" v-html="rlco_detail.description"></div>
                            <table class="table detail-table">
                                <tbody>
                                <tr>
                                    <th>Business Category/ Section</th>
                                    <td>{{ rlco_detail.business_category?.category_name }}</td>
                                </tr>

                                <tr v-if="rlco_detail.title_of_law && rlco_detail.link_of_law">
                                    <th>Enforcing Law</th>
                                    <td><a target="_blank" :href="rlco_detail.link_of_law">{{ rlco_detail.title_of_law }}</a></td>
                                </tr>

                                <tr v-if="rlco_detail.fee">
                                    <th>Fee (PKR)</th>
                                    <td>{{ rlco_detail.fee }}</td>
                                </tr>

                                <tr v-if="rlco_detail.fee_submission_mode">
                                    <th>Payment Mode</th>
                                    <td>{{ rlco_detail.fee_submission_mode }}</td>
                                </tr>

                                <tr v-if="rlco_detail.validity">
                                    <th>Validity</th>
                                    <td>{{ rlco_detail.validity }}</td>
                                </tr>

                                <tr v-if="rlco_detail.renewal_fee">
                                    <th>Renewal Fee</th>
                                    <td>{{ rlco_detail.renewal_fee }}</td>
                                </tr>

                                <tr v-if="rlco_detail.time_taken">
                                    <th>Processing Time</th>
                                    <td>{{ rlco_detail.time_taken }}&nbsp;{{ rlco_detail.time_unit }}</td>
                                </tr>

                                <tr v-if="rlco_detail.process_flow_diagram_file">
                                    <th>Process Flow Diagram</th>
                                    <td><a target="_blank" :href="rlco_detail.process_flow_diagram_file" download><font-awesome-icon icon="download" /></a></td>
                                </tr>

                                <tr v-if="rlco_detail.inspection_required">
                                    <th>Inspection</th>
                                    <td>{{ rlco_detail.inspection_required }}</td>
                                </tr>
                                <tr v-if="rlco_detail.mode_of_inspection">
                                    <th>Mode of Inspection</th>
                                    <td>{{ rlco_detail.mode_of_inspection }}</td>
                                </tr>
                                <tr v-if="rlco_detail.inspection_department">
                                    <th>Joint inspection with</th>
                                    <td>{{ rlco_detail.inspection_department?.department_name }}</td>
                                </tr>
                                <tr v-if="rlco_detail.fine_details">
                                    <th>Fine Details</th>
                                    <td><p v-html="rlco_detail.fine_details"></p></td>
                                </tr>

                                </tbody>
                            </table>

                            <h3  v-if="rlco_detail.required_documents?.length > 0" class="detail-heading pt-3 pb-2">Documents to be Attached</h3>
                            <table class="table detail-table" v-if="rlco_detail.required_documents?.length > 0">

                                <tbody>
                                <tr v-for="(document, index) in rlco_detail.required_documents">
                                    <td>{{ document.document_title }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <h3  v-if="rlco_detail.dependencies?.length > 0" class="detail-heading pt-3 pb-1">Dependencies</h3>
                            <table class="table detail-table" v-if="rlco_detail.dependencies?.length > 0">
                                <thead>
                                <tr>
                                    <th>Organization</th>
                                    <th>Activity name</th>
                                    <th>Priority</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(dependency, index) in rlco_detail.dependencies">
                                    <td>{{ dependency.department?.department_name }}</td>
                                    <td>{{ dependency.activity_name }}</td>
                                    <td>{{ dependency.priority }}</td>
                                    <td>{{ dependency.remark }}</td>
                                </tr>
                                </tbody>
                            </table>


                            <h3  v-if="rlco_detail.faqs?.length > 0" class="detail-heading pt-3 pb-1">FAQs</h3>

                            <div v-if="rlco_detail.faqs?.length > 0" class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionFaqs">

                                <div v-for="(faq, index) in rlco_detail.faqs" class="card bg-custom-color">
                                    <div class="card-header" :id="`heading_faq_${index}`">
                                        <div class="card-title collapsed" data-toggle="collapse" :data-target="`#collapse_faq_${index}`" aria-expanded="false">
																<span class="svg-icon svg-icon-primary">
																	<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
																			<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                            <div class="card-label pl-4">{{ faq.faq_question }}</div>
                                        </div>
                                    </div>
                                    <div :id="`collapse_faq_${index}`" class="collapse" data-parent="#accordionFaqs">
                                        <div class="card-body pl-12" v-html="faq.faq_answer"></div>
                                        <div v-if="faq.faq_file"><a class="btn" :href="faq.faq_file" target="_blank" download><font-awesome-icon icon="download" /></a></div>
                                    </div>
                                </div>

                            </div>


                            <h3  v-if="rlco_detail.foss?.length > 0" class="detail-heading pt-3 pb-1">Common Mistakes</h3>

                            <table class="table detail-table" v-if="rlco_detail.foss?.length > 0">

                                <tbody>
                                <tr v-for="(fos, index) in rlco_detail.foss">
                                    <td>{{ fos.fos_observation }}</td>
                                    <td><span v-if="fos.fos_file"><a :href="fos.fos_file" target="_blank" download><font-awesome-icon icon="download" /></a></span></td>
                                </tr>
                                </tbody>
                            </table>

                            <h3  v-if="rlco_detail.other_documents?.length > 0" class="detail-heading pt-3 pb-1">Help Documents</h3>
                            <table class="table detail-table" v-if="rlco_detail.other_documents?.length > 0">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(document, index) in rlco_detail.other_documents">
                                    <td>{{ document.document_title }}</td>
                                    <td><span v-if="document.document_file"><a target="_blank" :href="document.document_file" download><font-awesome-icon icon="download" /></a></span></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="row detail-btn my-3  mb-2">
                                <div class="col-lg-6" v-if="rlco_detail.automation_status !='No Information' && rlco_detail.application_url"> <a class="btn btn-sm px-3 text-light custom-detail-btn" target="_blank"  :href="rlco_detail.application_url">Online Application Form</a></div>
                                <div class="col-lg-6 text-right"  v-if="rlco_detail.department_website"><a class="btn btn-sm px-3 text-light custom-detail-btn" target="_blank"  :href="rlco_detail.department_website">More Information</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

</template>

<script>
import SearchForm from "../components/SearchForm";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faStar, faFolder, faDownload } from '@fortawesome/free-solid-svg-icons'
library.add(faStar,faFolder, faDownload)

export default {
    name: "SearchResult",
    props:{
        prop_department_id: "",
        prop_business_category_id: "",
        prop_activity_id: ""
    },
    data() {
        return {
            activities: [],
            rlcos: [],
            activity_rlcos: [],
            rlco_detail: {},
            now: new Date().toISOString(),
            loading: true,
            department_id: "",
            business_category_id: "",
            activity_id: "",
            activeActivity : '0',
            activeRlco : 0,
            totalRlcos: 0,
            filterSearch: "",
            scopeSort: null,
            activityName: "Starting a Business",
            rlcoName: "Business Number Registration",
            favorites: [],
        }
    },
    computed: {
        filteredList:function () {
            return  this.activity_rlcos.filter(rlco => {
                return rlco.rlco_name?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                       rlco.purpose?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                       rlco.scope?.toLowerCase().includes(this.filterSearch?.toLowerCase())
            }).sort((a, b) => {
                return this.scopeSort===null?0:(this.scopeSort ?((a?.scope > b?.scope) ? 1 : -1): ((b?.scope > a?.scope) ? 1 : -1));
            });
        }
    },
    filters: {

    },
    components: {SearchForm},
    mounted() {
            this.department_id = this.prop_department_id;
            this.business_category_id = this.prop_business_category_id;
            this.activity_id = this.prop_activity_id;
            this.loadFavoriteItems();
            this.loadActivities();
     },
    methods: {
        loadFavoriteItems: function(){
            if (localStorage.getItem('favorites')) {
                try {
                    this.favorites = JSON.parse(localStorage.getItem('favorites'));
                } catch(e) {
                    localStorage.removeItem('favorites');
                }
            }
        },
        searchParams: function (params){
            this.department_id = params.department_id;
            this.business_category_id = params.business_category_id;
            this.activity_id = params.activity_id;
            this.loadActivities();
        },
         loadActivities: function () {
            this.loading = true;
            axios.get('rlcos_search', {
                params: {
                    department_id: this.department_id,
                    business_category_id: this.business_category_id,
                    activity_id: this.activity_id,
                }
            }).then(response => {
                this.rlco_detail = {};
                this.activity_rlcos = [];
                this.activities = response.data.activities;
                this.totalRlcos = response.data.total_rlcos;
                this.rlcos = response.data.rlcos;
                let activity = _.head(this.activities);
                if(activity!==undefined) {
                    this.findRlcos(activity);
                }
                this.loading = false;
            })
        },
         findRlcos: function (activity){
             this.activeActivity = activity.id;
             this.activityName = activity.activity_name;
             this.activity_rlcos = this.rlcos.filter((rlco) => rlco.activity_id === parseInt(activity.id));
             let rlco = _.head(this.activity_rlcos);
             if(rlco!==undefined) {
                 this.rlcoDetail(rlco);
             }
         },
         rlcoDetail: function (rlco){
           this.activeRlco = rlco.id;
           this.rlcoName = rlco.rlco_name;
           let detail = this.activity_rlcos.filter((rlco) => rlco.id === parseInt(rlco.id));
           if(detail)
           this.rlco_detail = detail[0];
        },
         toggleSort: function (){
            if(this.scopeSort===null) {
                this.scopeSort = false;
            }else
            this.scopeSort = !this.scopeSort
        },
         allActivites: function(){
             this.activity_rlcos = this.rlcos;
             this.activeActivity='all';
             this.activityName = 'All Activities';
             let rlco = _.head(this.activity_rlcos);
             if(rlco!==undefined) {
                 this.rlcoDetail(rlco);
             }
         },
        isFavorite:function (rlco){
            let items = this.favorites.filter((fav) => fav.id === parseInt(rlco.id));
            return items.length;
        },
        toggleFavorite: function (rlco){
            if(this.isFavorite(rlco))
            this.favorites = this.favorites.filter((fav) => fav.id !== parseInt(rlco.id));
            else
            this.favorites.push(rlco);

            console.log(this.favorites);

            const parsedFavorites = JSON.stringify(this.favorites);
            localStorage.setItem('favorites', parsedFavorites);
        }

    },

}
</script>

<style scoped>

</style>
