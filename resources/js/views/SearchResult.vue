<template>
        <div class="wrapping-searching">
        <SearchForm :prop_department_id="prop_department_id" :prop_business_category_id="prop_business_category_id" :prop_activity_id="prop_activity_id" @search-params="searchParams" />

            <div class="row mt-5">

                <div class="col-lg-3">
                    <h4 class="searching-box-heading">Browse by Activity</h4>
                    <div class="activities-listing overflow-auto">

                        <div v-for="(activity, index) in activities" class="row list-item" :key="activity.id" :class="[(activeActivity == activity.id) ? 'active':'']" @click.prevent="findRlcos(activity.id)">
                            <div class="col-lg-10 col-md-10">
                                <span class="list-icon"><font-awesome-icon icon="folder" /></span>
                                <span class="list-title">{{ activity.activity_name }}</span>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="list-count">{{ activity.rlcos_count }}</span>
                            </div>
                        </div>


                        <div  class="row list-item " :class="[(activeActivity == 'all') ? 'active':'']" @click.prevent="activity_rlcos = rlcos; activeActivity='all';">
                            <div class="col-lg-10 col-md-10">
                                <span class="list-icon"><font-awesome-icon icon="folder" /></span>
                                <span class="list-title">All Activities</span>
                            </div>
                            <div class="col-lg-2 col-md-2 text-center">
                                <span class="list-count">{{ totalRlcos }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 pl-0 pr-0">
                    <h4 class="searching-box-heading">
                        Starting a Business</h4>
                    <div class="business-listing overflow-auto">
                        <div  class="row list-item">
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                <span class="list-icon"><font-awesome-icon icon="star" /></span>
                                <span><span class="tiny-label">Permit Title</span><input type="text" v-model="filterSearch" class="tiny-search-field" placeholder="Filter titles by keyword..."></span>
                                </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                <span class="sorting">
                                    <a href="#" @click.prevent="scopeSort = !scopeSort"><span>Scope</span></a>
                                    <span class="triangle-down" v-if="scopeSort"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="triangle-down"><polygon points="5 7 15 7 10 12"></polygon></svg></span>
                                    <span class="triangle-up" v-if="!scopeSort"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="triangle-up"><polygon points="5 13 10 8 15 13"></polygon></svg></span>
                                </span>
                             </div>
                        </div>

                        <div v-for="(rlco, index) in filteredList" class="row list-item" :key="rlco.id" :class="[(activeRlco == rlco.id) ? 'active':'']" @click.prevent="rlcoDetail(rlco.id)">
                            <div class="col-lg-9 col-md-9">
                                <span class="list-icon"><font-awesome-icon icon="star" /></span>
                                <span class="list-heading">{{ rlco.rlco_name }}</span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <span class="list-scop">{{ rlco.scope }}</span>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <span class="list-desc">{{ rlco.purpose }}</span>
                            </div>

                        </div>



                    </div>
                </div>

                <div class="col-lg-5">
                    <h4 class="searching-box-heading">Business Number Registration</h4>
                    <div class="business-detail overflow-auto">
                        <div v-if="rlco_detail && rlco_detail.id" class="col-md-12 list-detail">
                            <h3 class="detail-heading">{{ rlco_detail.rlco_name}} </h3>
                            <span class="detail-scope">{{ rlco_detail.scope }}</span>
                            <span class="detail-department">{{ rlco_detail.department?.department_name }}</span>
                            <div class="detail-desc" v-html="rlco_detail.description"></div>
                            <table class="table detail-table">
                                <tbody>
                                <tr>
                                    <th>Business Category/ Section</th>
                                    <td>{{ rlco_detail.business_category?.category_name }}</td>
                                </tr>
                                <tr v-if="rlco_detail.title_of_law">
                                    <th>Title of Law</th>
                                    <td>{{ rlco_detail.title_of_law }}</td>
                                </tr>
                                <tr v-if="rlco_detail.link_of_law">
                                    <th>Link of Law</th>
                                    <td><a target="_blank" :href="rlco_detail.link_of_law">Visit Link</a></td>
                                </tr>

                                <tr v-if="rlco_detail.fee">
                                    <th>Fee</th>
                                    <td>{{ rlco_detail.fee }}</td>
                                </tr>

                                <tr v-if="rlco_detail.fee_submission_mode">
                                    <th>Fee Submission Mode</th>
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
                                    <th>Time Taken</th>
                                    <td>{{ rlco_detail.time_taken }}&nbsp;{{ rlco_detail.time_unit }}</td>
                                </tr>

                                <tr v-if="rlco_detail.process_flow_diagram_file">
                                    <th>Process Flow Diagram</th>
                                    <td><a target="_blank" :href="processDiagramFile">Download</a></td>
                                </tr>

                                </tbody>
                            </table>

                            <h3  v-if="rlco_detail.required_documents?.length > 0" class="detail-heading pt-2 pb-2">REQUIRED DOCUMENTS</h3>
                            <table class="table detail-table" v-if="rlco_detail.required_documents?.length > 0">
                                <thead>
                                <tr>
                                    <th>Sr. No.	</th>
                                    <th>Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(document, index) in rlco_detail.required_documents">
                                    <th>{{ index+1 }}</th>
                                    <td>{{ document.document_title }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <h3  v-if="rlco_detail.dependencies?.length > 0" class="detail-heading pt-2 pb-2">DEPENDENCIES</h3>
                            <table class="table detail-table" v-if="rlco_detail.dependencies?.length > 0">
                                <thead>
                                <tr>
                                    <th>Sr. No.	</th>
                                    <th>Organization</th>
                                    <th>Activity name</th>
                                    <th>Priority</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(dependency, index) in rlco_detail.dependencies">
                                    <th>{{ index+1 }}</th>
                                    <td>{{ dependency.department?.department_name }}</td>
                                    <td>{{ dependency.activity_name }}</td>
                                    <td>{{ dependency.priority }}</td>
                                    <td>{{ dependency.remark }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <h3 class="detail-heading pt-2 pb-2">INSPECTIONS</h3>
                            <table class="table detail-table">
                                <tbody>
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

                            <h3  v-if="rlco_detail.faqs?.length > 0" class="detail-heading pt-2 pb-2">FAQs</h3>

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
                                    </div>
                                </div>

                            </div>


                            <h3  v-if="rlco_detail.foss?.length > 0" class="detail-heading pt-2 pb-2">Observations</h3>

                            <div v-if="rlco_detail.foss?.length > 0" class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionFoss">

                                <div v-for="(fos, index) in rlco_detail.foss" class="card bg-custom-color">
                                    <div class="card-header" :id="`heading_fos_${index}`">
                                        <div class="card-title collapsed" data-toggle="collapse" :data-target="`#collapse_fos_${index}`" aria-expanded="false">
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
                                            <div class="card-label pl-4">{{ fos.fos_observation }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <h3  v-if="rlco_detail.other_documents?.length > 0" class="detail-heading pt-2 pb-2">OTHER DOCUMENTS</h3>
                            <table class="table detail-table" v-if="rlco_detail.other_documents?.length > 0">
                                <thead>
                                <tr>
                                    <th>Sr. No.	</th>
                                    <th>Title</th>
                                    <th>Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(document, index) in rlco_detail.other_documents">
                                    <th>{{ index+1 }}</th>
                                    <td>{{ document.document_title }}</td>
                                    <td><a :href="`${base_url}/storage/${document.document_file}`">Download</a></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="detail-btn my-3">
                            <a class="btn btn-sm px-4 text-light custom-detail-btn mb-2" target="_blank" v-if="rlco_detail.automation_status !='No Information' && rlco_detail.application_url"  :href="rlco_detail.application_url">ONLINE APPLICATION FORM</a>
                                <br>
                            <a class="btn btn-sm px-4 text-light custom-detail-btn mb-2" target="_blank" v-if="rlco_detail.department_website" :href="rlco_detail.department_website">MORE INFORMATION</a>
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
import { faStar, faFolder } from '@fortawesome/free-solid-svg-icons'
import activity from "../store/modules/activity";
library.add(faStar,faFolder)

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
            base_url: '',
            scopeSort: false,
        }
    },
    computed: {
        filteredList:function () {
            return  this.activity_rlcos.filter(rlco => {
                return rlco.rlco_name?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                       rlco.purpose?.toLowerCase().includes(this.filterSearch?.toLowerCase()) ||
                       rlco.scope?.toLowerCase().includes(this.filterSearch?.toLowerCase())
            }).sort((a, b) => {
                return this.scopeSort ?((a?.scope > b?.scope) ? 1 : -1): ((b?.scope > a?.scope) ? 1 : -1);
            });
        },
        processDiagramFile: function () {
            return process.env.MIX_BASE_URL+'/storage/'+this.rlco_detail.process_flow_diagram_file;
        },
    },
    filters: {

    },
    components: {SearchForm},
    mounted() {
            this.base_url = process.env.MIX_BASE_URL;
            this.department_id = this.prop_department_id;
            this.business_category_id = this.prop_business_category_id;
            this.activity_id = this.prop_activity_id;
            this.loadActivities();
     },
    methods: {
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
                    this.findRlcos(activity.id);
                }
                this.loading = false;
            })
        },
         findRlcos: function (id){
             this.activeActivity = id;
             this.activity_rlcos = this.rlcos.filter((rlco) => rlco.activity_id === parseInt(id));
             let rlco = _.head(this.activity_rlcos);
             if(rlco!==undefined) {
                 this.rlcoDetail(rlco.id);
             }
         },
         rlcoDetail: function (id){
           this.activeRlco = id;
           let detail = this.activity_rlcos.filter((rlco) => rlco.id === parseInt(id));
           if(detail)
           this.rlco_detail = detail[0];
        },
    },

}
</script>

<style scoped>

</style>
