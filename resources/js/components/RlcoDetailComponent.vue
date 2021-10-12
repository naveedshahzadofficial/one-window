<template>
    <div id="printSection" >

        <div class="section-detail-heading">
            <h4  v-text="rlco_detail?.rlco_name?rlco_detail?.rlco_name:'No RLCOs found.'"></h4>
            <span v-if="rlco_detail?.id && !isOverFlow" class="view-detail-icon" @click.prevent="openDetailPage" title="Full Page"><font-awesome-icon icon="expand" /></span>
            <span v-if="rlco_detail?.id && isOverFlow" class="view-detail-icon"   v-print="printObj" title="Print Page"><font-awesome-icon icon="print" /></span>
        </div>

        <div id="top_detail" ref="detail_page" class="business-detail"  :class="[{'overflow-auto': !isOverFlow}, {'overflow-hidden h-100': isOverFlow}]">
            <div v-if="rlco_detail && rlco_detail.id" class="col-lg-12 col-md-12 list-detail">
                <div class="col-lg-12 col-md-12">
                    <div class="row"><span class="detail-department">{{ rlco_detail.department?.department_name }}</span></div>
                    <div class="row"><span class="detail-scope">{{ rlco_detail.scope }}</span></div>
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

                    <tr v-if="rlco_detail.fee_question">
                        <th>Fee (PKR)</th>
                        <td> <span v-if="rlco_detail.fee_question==='Yes' && rlco_detail.fee_plan==='Schedule' && rlco_detail.fee_schedule" @click.prevent="toggleModal" class="make-link">Fee Schedule</span>
                             <span v-else-if="rlco_detail.fee_question==='Yes' && rlco_detail.fee_plan==='Single Fee' && rlco_detail.fee">{{ rlco_detail.fee }}</span>
                             <span v-else>Not Applicable</span>
                        </td>
                    </tr>

                    <tr v-if="rlco_detail.fee_question==='Yes' && rlco_detail.fee_submission_mode==='Online' && rlco_detail.payment_source">
                        <th>Payment Mode</th>
                        <td><span  v-if="rlco_detail.payment_source==='ePay Punjab'">Online</span>  <span v-if="rlco_detail.payment_source==='Banks'">Online</span></td>
                    </tr>

                    <tr v-if="rlco_detail.fee_question==='Yes' && rlco_detail.fee_submission_mode==='Manual' && rlco_detail.fee_manual_mode">
                        <th>Payment Mode</th>
                        <td><span  v-if="rlco_detail.fee_manual_mode==='OTC'"><a :href="rlco_detail.challan_form_file" target="_blank">Challan form</a></span>  <span v-if="rlco_detail.fee_manual_mode==='By Hand'">By Hand</span></td>
                    </tr>



                    <tr v-if="rlco_detail.time_taken || rlco_detail.time_unit">
                        <th>Processing Time</th>
                        <td>{{ rlco_detail.time_taken }}&nbsp;{{ rlco_detail.time_unit }}</td>
                    </tr>

                    <tr v-if="rlco_detail.renewal_required==='Yes' &&  rlco_detail.validity">
                        <th>Validity</th>
                        <td>{{ rlco_detail.validity }}</td>
                    </tr>

                    <tr v-if="rlco_detail.renewal_required">
                        <th>Renewal Fee (PKR)</th>
                        <td> <span v-if="rlco_detail.renewal_required==='Yes' && rlco_detail.renewal_fee_plan==='Schedule' && rlco_detail.renewal_fee_schedule" @click.prevent="toggleModalRenewal" class="make-link">Renewal Fee Schedule</span>
                            <span v-else-if="rlco_detail.renewal_required==='Yes' && rlco_detail.renewal_fee_plan==='Single Fee' && rlco_detail.renewal_fee">{{ rlco_detail.renewal_fee }}</span>
                            <span v-else>Not Applicable</span>
                        </td>
                    </tr>


                    <tr v-if="rlco_detail.inspection_required">
                        <th>Inspection</th>
                        <td>{{ rlco_detail.inspection_required=='None'?'Not Applicable':'Applicable' }}</td>
                    </tr>

                    <tr v-if="rlco_detail.mode_of_inspection && 1==2">
                        <th>Mode of Inspection</th>
                        <td>{{ rlco_detail.mode_of_inspection }}</td>
                    </tr>
                    <tr v-if="rlco_detail.inspection_department  && 1==2">
                        <th>Joint inspection with</th>
                        <td>{{ rlco_detail.inspection_department?.department_name }}</td>
                    </tr>
                    <tr v-if="rlco_detail.fine_details && 1==2">
                        <th>Fine Details</th>
                        <td><p v-html="rlco_detail.fine_details"></p></td>
                    </tr>

                    <tr v-if="rlco_detail.process_flow_diagram_file">
                        <th>Process Flow Diagram</th>
                        <td><a target="_blank" :href="rlco_detail.process_flow_diagram_file" download><font-awesome-icon icon="download" /></a></td>
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
                    <tbody>
                    <tr v-for="(dependency, index) in rlco_detail.dependencies">
                        <td>{{ dependency.activity_name }}<div style="font-size: 12px; margin-top: -5px;">From {{ dependency.department?.department_name }}</div></td>
                    </tr>
                    </tbody>
                </table>


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
                    <tbody>
                    <tr v-for="(document, index) in rlco_detail.other_documents">
                        <td>{{ document.document_title }}</td>
                        <td><span v-if="document.document_file"><a target="_blank" :href="document.document_file" download><font-awesome-icon icon="download" /></a></span></td>
                    </tr>
                    </tbody>
                </table>


                <div  v-if="rlco_detail.faqs?.length > 0">
                    <h3 class="detail-heading pt-3 pb-1">FAQs</h3>
                <a href="javascript:;" class="text-decoration-none btn-expend" @click.prevent="isExpand=false">Collapse All</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="text-decoration-none btn-expend" @click.prevent="isExpand=true" >Expand All</a>
                </div>

                <div v-if="rlco_detail.faqs?.length > 0" class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionFaqs">

                    <div v-for="(faq, index) in rlco_detail.faqs" class="card bg-custom-color">
                        <div class="card-header" :id="`heading_faq_${index}`">
                            <div class="card-title" :class="!isExpand?'collapsed':''" data-toggle="collapse" :data-target="`#collapse_faq_${index}`" :aria-expanded="isExpand?true:false">
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
                        <div :id="`collapse_faq_${index}`" class="collapse" :class="isExpand?'show':''" data-parent="#accordionFaqs">

                            <div class="card-body pt-2 pb-0">
                            <div  v-html="faq.faq_answer"></div>
                            <div v-if="faq.faq_file"><a class="btn" :href="faq.faq_file" target="_blank" download>Download attachment <font-awesome-icon icon="download" /></a></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="detail-btn my-3 d-flex justify-content-center">
                    <div  v-if="rlco_detail.automation_status !='No Information' && rlco_detail.application_url"> <a class="btn btn-sm px-3 text-light custom-detail-btn" target="_blank"  :href="rlco_detail.application_url">Apply Online</a></div>&nbsp;&nbsp;
                    <div  v-if="rlco_detail.department_website"><a class="btn btn-sm px-3 text-light custom-detail-btn" target="_blank"  :href="rlco_detail.department_website">Department Website</a></div>
                </div>

                <div v-if="rlco_detail.last_updated_date" class="row detail-btn my-3  mb-2">
                    <div class="col-lg-12 text-left">
                        <span class="last-updated-date">Last verified: {{ rlco_detail.last_updated_date }}</span>
                    </div>
                </div>

                <div v-show="!isSubmitted && !checkFeedbackExits" class="row feedback-div">
                    <div class="col-lg-12">
                    <h3 class="detail-heading pt-3 pb-2">Rating & Review</h3>
                    <div class="text-body">How would you rate this information?</div>
                    </div>
                </div>
                <div v-show="!isSubmitted && !checkFeedbackExits" class="row mb-4 feedback-div">
                    <div class="col-lg-12 text-left">
                    <star-rating  :star-size="30" :show-rating="false" @update:rating="feedbackForm.rating = $event"  />
                     </div>
                    <div v-show="feedbackForm.rating" class="col-lg-12 mt-3 mb-5 feedback-div">
                        <label for="feedback" v-text="currentFeedbackLabel"></label>
                        <textarea class="form-control" name="feedback" id="feedback" v-model="feedbackForm.feedback" cols="2" rows="2"></textarea>
                        <button class="btn btn-sm px-3 text-light custom-detail-btn mt-3" @click.prevent="submitFeedback">Submit</button>
                    </div>
                </div>

                <div v-show="isSubmitted" class="row mb-4 feedback-div">
                    <div class="col-lg-12 text-center">
                        Thank you for your feedback!
                    </div>
                </div>

            </div>

            <div v-if="!isOverFlow" class="scroll-top" @click.prevent="scrollToTop">
                <font-awesome-icon class="svg-icon" icon="arrow-up" />
            </div>

            <div class="col-lg-12 col-md-12 pb-3">
            <a href="javascript:;" v-if="rlco_detail?.id" class="text-decoration-none view-detail-icon" v-print="printObj"><font-awesome-icon icon="print" />&nbsp; Print it</a>
            </div>

        </div>


    <base-modal-component title="Fee Schedule" @toggle-modal="toggleModal" v-if="isShowModal">
            <div v-html="rlco_detail?.fee_schedule"></div>
    </base-modal-component>

    <base-modal-component title="Renewal Fee Schedule" @toggle-modal="toggleModalRenewal" v-if="isShowModalRenewal">
        <div v-html="rlco_detail?.renewal_fee_schedule"></div>
    </base-modal-component>
    </div>

</template>

<script>

import BaseModalComponent from "./BaseModalComponent";
import StarRating from 'vue-star-rating'

export default {
    name: "RlcoDetailComponent",
    components: {
        BaseModalComponent,
        StarRating
    },
    props: {
        rlco_detail: Object,
        isOverFlow: Boolean,
    },
    data: () => ({
        base_url: process.env.MIX_BASE_URL,
        isShowModal: false,
        isShowModalRenewal: false,
        feedbackForm: {
            rating: null,
            feedback: ''
        },
        feedback_label: "Glad to know any additional feedback",
        isSubmitted: false,
        printObj: {
            id: "printSection",
            popTitle: 'BizPunjab',
            extraCss: process.env.MIX_BASE_URL+'/assets/print.css',
        },
        isExpand: false,
    }),
    mounted() {
        if(!this.isOverFlow) {
            window.addEventListener('scroll', this.handleScroll);
            this.$refs.detail_page.addEventListener('scroll', this.handleDetailScroll);
        }
    },
    watch: {
        rlco_detail: function(newVal, oldVal) { // watch it
           if(oldVal && !this.isOverFlow){
               this.$refs.detail_page.scrollTo(0, 0);
               this.isShowModalRenewal =  false;
               this.feedbackForm = {rating: null, feedback: ''};
               this.feedback_label=  "Glad to know any additional feedback";
               this.isSubmitted = false;
           }
        }
    },
    computed: {
        currentRatingText() {
            return this.feedbackForm.rating
                ? "You have selected " + this.feedbackForm.rating + " stars"
                : "Please select your rating";
        },
        currentFeedbackLabel() {
            if(this.feedbackForm.rating <= 3){
                this.feedback_label = "Tell us how can we improve";
            }else{
                this.feedback_label = "Glad to know any additional feedback";
            }
            return this.feedback_label;
        },
        feedbacks(){
            if (localStorage.getItem("rlcoFeedbacks")){
                return JSON.parse(localStorage.getItem("rlcoFeedbacks"))
            }
            return [];
        },
        checkFeedbackExits(){
           let rlco = this.feedbacks.filter((rlco) => (rlco.rlco_id === this.rlco_detail?.id));
           return !!(rlco && rlco.length);
        }
    },
    methods: {
        toggleModal() {
            this.isShowModal = !this.isShowModal;
        },
        toggleModalRenewal() {
            this.isShowModalRenewal = !this.isShowModalRenewal;
        },
        scrollToTop() {
            let refDiv = this.$refs.detail_page;
                refDiv.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
        },
        handleScroll: function () {
            let scrollY = window.scrollY;
            document.querySelector(".scroll-top").style.bottom = (50 + scrollY)+'px' ;
        },
        handleDetailScroll: function (){
            let scrollTop = this.$refs.detail_page.scrollTop;
            if(scrollTop > 200){
                document.querySelector(".scroll-top").style.display = 'block' ;
            }else{
                document.querySelector(".scroll-top").style.display = 'none' ;
            }
        },
        submitFeedback: function (){
            this.isSubmitted = true;
            axios.post(`review/${this.rlco_detail?.id}`, this.feedbackForm ).then(response => {
                let feedback = {rlco_id: response.data.id};
                localStorage.setItem('rlcoFeedbacks',JSON.stringify([...this.feedbacks, feedback]))
                this.loading = false;
            }).catch(error => {
                this.loading = false;
            })
        },
        openDetailPage: function (){
            let routeData = this.$router.resolve({ name: 'rlcos.show', params: { id: this.rlco_detail.id } });
            window.open(routeData.href, '_blank');
        },
    },
}
</script>

<style scoped>

</style>
