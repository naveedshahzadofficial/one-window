<?php

namespace App\Http\Livewire;

use App\Models\AddressCapacity;
use App\Models\AddressForm;
use App\Models\AddressType;
use App\Models\Application;
use App\Models\ApplicationEmployeeInfo;
use App\Models\ApplicationTechnicalEducation;
use App\Models\ApplicationUtilityConnection;
use App\Models\BusinessActivity;
use App\Models\BusinessLegalStatus;
use App\Models\BusinessRegistrationStatus;
use App\Models\City;
use App\Models\ConnectionOwnership;
use App\Models\DesignationBusiness;
use App\Models\District;
use App\Models\EducationLevel;
use App\Models\EmployeeType;
use App\Models\Gender;
use App\Models\MinorityStatus;
use App\Models\MobileCode;
use App\Models\Prefix;
use App\Models\Province;
use App\Models\Question;
use App\Models\Tehsil;
use App\Models\UtilityForm;
use App\Models\UtilityType;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationForm extends Component
{
    use WithFileUploads;

    public $prefixes;
    public $genders;
    public $application;
    public $designations;
    public $questions;
    public $minority_status;
    public $education_level;

    public $address_types;
    public $residence_address_forms;
    public $business_address_forms;

    public $cities;
    public $districts;
    public $address_capacities;
    public $business_registration_status;
    public $business_legal_statuses;
    public $provinces;
    public $ownerships;
    public $utility_types;

    public $employees = [];
    public $employee_types;

    public $employee_numbers;

    public $business_activities;

    // UtilityConnections
    public $utility_forms;
    public $utility_connections = [['utility_provider_other'=>null, 'utility_form_id'=>null, 'utility_consumer_number'=>null, 'utility_type_id'=>null, 'connection_ownership_id'=>null,]];
    public $technical_educations = [['certificate_title'=>null]];

    // on parent load
    public $business_cities;
    public $business_districts;
    public $business_tehsils;
    public $utility_service_providers;

    public $is_minority_status = false;
    public $is_minority_status_other = false;
    public $is_skilled_worker = false;
    public $is_business_registered = false;
    public $is_employee_info = false;
    public $is_utility_connection = true;
    public $is_technical_education = false;

    // files
    public $proof_of_ownership_file,$registration_certificate_file,
        $license_registration_file,$business_evidence_ownership_file;


    public $step;
    private $stepActions = [
        'submitApplicantProfile',
        'submitBusinessProfile',
        'submitUtilityConnections',
        'submitEmployeesInfo',
        'submitReview',
    ];

    public $registration;


    public function mount($registration=null)
    {
        $this->registration = null;

        $this->step = 0;
        $this->prefixes = Prefix::where('prefix_status',1)->get();
        $this->genders = Gender::where('gender_status',1)->get();

        $this->designations = DesignationBusiness::where('status',1)->get();
        $this->questions = Question::where('status',1)->get();
        $this->minority_status = MinorityStatus::where('status',1)->get();
        $this->education_level = EducationLevel::where('status',1)->get();

        $this->address_types = AddressType::where('type_status',1)->get();
        $this->utility_forms = UtilityForm::where('form_status',1)->get();

        $this->cities = City::where('city_status',1)->get();
        $this->districts = District::where('district_status',1)->get();
        $this->address_capacities = AddressCapacity::where('capacity_status',1)->get();
        $this->business_registration_status = BusinessRegistrationStatus::where('status',1)->get();
        $this->business_legal_statuses = BusinessLegalStatus::where('legal_status',1)->get();

        $this->business_activities = BusinessActivity::where('activity_status',1)->get();

        $this->provinces = Province::where('province_status',1)->get();
        $this->ownerships = ConnectionOwnership::where('ownership_status',1)->get();
        $this->utility_types = UtilityType::where('type_status',1)->get();

        $this->employee_types = EmployeeType::where('type_status',1)->get();

        $this->employee_numbers = 20;

        // on parent load
        $this->residence_address_forms = collect();
        $this->business_address_forms = collect();
        $this->business_cities = collect();
        $this->business_districts = collect();
        $this->business_tehsils = collect();

        $this->utility_service_providers = collect();

        $this->application['user_id'] = auth()->id();
        $this->application['prefix_id'] = auth()->user()->prefix_id;
        $this->application['first_name'] = auth()->user()->first_name;
        $this->application['last_name'] = auth()->user()->last_name;
        $this->application['middle_name'] = auth()->user()->middle_name;
        $this->application['last_name'] = auth()->user()->last_name;
        $this->application['cnic_no'] = auth()->user()->cnic_no;
        $mobile_code= MobileCode::where('id',auth()->user()->mobile_code_id)->first();
        $this->application['personal_mobile_no'] = ($mobile_code->code_number).auth()->user()->mobile_no;
        $this->application['personal_email'] = auth()->user()->email;
        $this->application['utility_connection_question_id'] = $this->questions->firstWhere('name', 'Yes')->id;


        if($registration){
            $this->application = $registration->toArray();

            $this->technical_educations = $registration->technicalEducations->toArray();
            if(empty($this->technical_educations))
                $this->technical_educations = [['certificate_title'=>null]];

            $this->utility_connections = $registration->utilityConnections->toArray();
            if(empty($this->utility_connections))
                $this->utility_connections = [['utility_provider_other'=>null, 'utility_form_id'=>null, 'utility_consumer_number'=>null, 'utility_type_id'=>null, 'connection_ownership_id'=>null,]];

            $this->employees = $registration->employeeInfos->toArray();
            $this->registration = $registration;
            $this->residence_address_forms = AddressForm::where('address_type_id',$registration->residence_address_type_id)->where('form_status',1)->get();
            $this->business_address_forms = AddressForm::where('address_type_id',$registration->business_address_type_id)->where('form_status',1)->get();
            $this->business_cities = City::where('province_id', $registration->business_province_id)->where('city_status',1)->get();
            $this->business_districts = District::where('province_id', $registration->business_province_id)->where('district_status',1)->get();
            $this->business_tehsils = Tehsil::where('district_id', $registration->business_district_id)->where('tehsil_status',1)->get();

            if($this->isYes('minority_status_question_id')){
                $this->is_minority_status = true;
            }
            if(isset($this->application['minority_status_id']) && $this->minority_status->firstWhere('id', $this->application['minority_status_id'])->name=='Other') {
                $this->is_minority_status_other = true;
            }

            if($this->isYes('technical_education_question_id')){
                $this->is_technical_education = true;
            }


            if($this->isYes('skilled_worker_question_id')){
                $this->is_skilled_worker = true;
            }

            if(isset($this->application['business_registration_status_id']) &&  $this->business_registration_status->firstWhere('id', $this->application['business_registration_status_id'])->name=='Registered'){
                $this->is_business_registered = true;
            }

            if($this->isYes('utility_connection_question_id')){
                $this->is_utility_connection = true;
            }

            if($this->isYes('employees_question_id')){
                $this->is_employee_info = true;
            }
        }


    }
    public function render()
    {
        return view('livewire.application-form');
    }
    public function decreaseStep()
    {
        if($this->step>0)
        $this->step--;
        $this->pageChangeDispatch();
    }
    public function updated($propertyName)
    {

    }

    public function updatedApplication($value, $updatedKey)
    {
        switch ($updatedKey){

            case 'residence_address_type_id':
                $this->application['residence_address_form_id'] = null;
                $this->residence_address_forms = AddressForm::where('address_type_id',$value)->where('form_status',1)->get();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->residence_address_forms,
                    'child_id'=>'#residence_address_form_id',
                    'field_name'=>'form_name',
                ]);
                break;
             case 'business_address_type_id':
                 $this->application['business_address_form_id'] = null;
                 $this->business_address_forms = AddressForm::where('address_type_id',$value)->where('form_status',1)->get();
                 $this->dispatchBrowserEvent('child:select2',[
                     'data'=>$this->business_address_forms,
                     'child_id'=>'#business_address_form_id',
                     'field_name'=>'form_name',
                 ]);
                break;

            case 'business_province_id':
                $this->application['business_city_id'] = null;
                $this->application['business_district_id'] = null;
                $this->business_cities = City::where('province_id', $value)->where('city_status',1)->get();
                $this->business_districts = District::where('province_id', $value)->where('district_status',1)->get();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->business_cities,
                    'child_id'=>'#business_city_id',
                    'field_name'=>'city_name_e',
                ]);
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->business_districts,
                    'child_id'=>'#business_district_id',
                    'field_name'=>'district_name_e',
                ]);
                $this->application['business_tehsil_id'] = null;
                $this->business_tehsils = collect();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->business_tehsils,
                    'child_id'=>'#business_tehsil_id',
                    'field_name'=>'tehsil_name_e',
                ]);
                break;

            case 'business_district_id':
                $this->application['business_tehsil_id'] = null;
                $this->business_tehsils = Tehsil::where('district_id', $value)->where('tehsil_status',1)->get();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->business_tehsils,
                    'child_id'=>'#business_tehsil_id',
                    'field_name'=>'tehsil_name_e',
                ]);
                break;
        }
    }

    public function submitApplication()
    {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function submitApplicantProfile()
    {
        //dd($this->application);
         $rules_applicant_profile = [
        'application.prefix_id' => 'required',
        'application.first_name' => 'required|string',
        'application.last_name' => 'required|string',
        'application.cnic_no' => 'required',
        'application.gender_id' => 'required',
        'application.cnic_issue_date' => 'required',
        'application.cnic_expiry_date' => 'required',
        'application.date_of_birth' => 'required',
        'application.designation_business_id' => 'required',
        'application.minority_status_question_id' => 'required',
        'application.education_level_id' => 'required',
        'application.technical_education_question_id' => 'required',
        'application.skilled_worker_question_id' => 'required',
        'application.residence_address_type_id' => 'required',
        'application.residence_address_form_id' => 'required',
        'application.residence_address_1' => 'required',
        'application.residence_address_2' => 'required',
        'application.residence_address_3' => 'required',
        'application.residence_city_id' => 'required',
        'application.residence_district_id' => 'required',
        'application.residence_capacity_id' => 'required',
        'application.residence_share' => 'required|numeric|min:0|max:100',
        'application.residence_acquisition_date' => 'required',
    ];
         $messages_applicant_profile = [
        'application.prefix_id.required' => 'Required.',
        'application.first_name.required' => 'First Name is required.',
        'application.last_name.required' => 'First Name is required.',
        'application.cnic_no.required' => 'CNIC is required.',
        'application.gender_id.required' => 'Gender is required.',
        'application.cnic_issue_date.required' => 'Issue Date is required.',
        'application.cnic_expiry_date.required' => 'Expiry Date is required.',
        'application.date_of_birth.required' => 'Date of Birth is required.',
        'application.designation_business_id.required' => 'Designation in Business is required.',
        'application.minority_status_question_id.required' => 'Please select your choice!',
        'application.education_level_id.required' => 'Education Level is required',
        'application.technical_education_question_id.required' => 'Please select your choice',
        'application.skilled_worker_question_id.required' => 'Please select your choice!',
        'application.residence_address_type_id.required' => 'Type is required.',
        'application.residence_address_form_id.required' => 'Form is required.',
        'application.residence_address_1.required' => 'Address 1 is required.',
        'application.residence_address_2.required' => 'Address 2 is required.',
        'application.residence_address_3.required' => 'Address 3 is required.',
        'application.residence_city_id.required' => 'City is required.',
        'application.residence_district_id.required' => 'District is required.',
        'application.residence_capacity_id.required' => 'Capacity is required.',
        'application.residence_share.required' => 'Share is required.',
        'application.residence_acquisition_date.required' => 'Acquisition Date is required.',
    ];

         if($this->isYes('minority_status_question_id')){
             $rules_applicant_profile['application.minority_status_id'] = 'required';
             $messages_applicant_profile['application.minority_status_id.required'] = 'Minority Status is required';
         }
        if(isset($this->application['minority_status_id']) && $this->minority_status->firstWhere('id', $this->application['minority_status_id'])->name=='Other') {
            $rules_applicant_profile['application.minority_status_other'] = 'required';
            $messages_applicant_profile['application.minority_status_other.required'] = 'Minority Status Other is required';
        }
        if($this->isYes('technical_education_question_id')){
            $rules_applicant_profile['technical_educations.*.certificate_title'] = 'required';
            $messages_applicant_profile['technical_educations.*.certificate_title.required'] = 'Diploma/ Certificate Title is required.';
        }else{
            $this->technical_educations = [];
        }

        if($this->isYes('skilled_worker_question_id')){
            $rules_applicant_profile['application.skill_or_art'] = 'required';
            $messages_applicant_profile['application.skill_or_art.required'] = 'Skill or Art is required';
        }
         //dd($rules_applicant_profile);

        $this->validate($rules_applicant_profile,$messages_applicant_profile);

        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        if($this->registration->technicalEducations->isNotEmpty())
            $this->registration->technicalEducations()->delete();
        $educations = array();
        foreach ($this->technical_educations as $education){
            if(isset($education['certificate_title']) && !empty($education['certificate_title']))
            array_push($educations,new ApplicationTechnicalEducation($education));
        }
        if(count($educations)>0)
        $this->registration->technicalEducations()->saveMany($educations);


        $this->step++;
        $this->successAlert();
    }

    public function submitBusinessProfile()
    {


         $rules_business_profile = [
        'application.business_name' => 'required',
        'application.business_establishment_date' => 'required',
        'application.business_registration_status_id' => 'required',
        'application.business_activity_id' => 'required',
        'application.business_address_type_id' => 'required',
        'application.business_address_form_id' => 'required',
        'application.business_address_1' => 'required',
        'application.business_address_2' => 'required',
        'application.business_address_3' => 'required',
        'application.business_province_id' => 'required',
        'application.business_city_id' => 'required',
        'application.business_district_id' => 'required',
        'application.business_tehsil_id' => 'required',
        'application.business_capacity_id' => 'required',
        'application.business_share' => 'required|numeric|min:0|max:100',
        'application.business_acquisition_date' => 'required',
        'application.business_contact_number' => 'required',
        'application.business_email' => 'required|email',
    ];
         $messages_business_profile = [
        'application.business_name.required' => 'Business Name is required.',
        'application.business_establishment_date.required' => 'Business Acquisition Date is required.',
        'application.business_registration_status_id.required' => 'Business Registration Status is required.',
        'application.business_activity_id.required' => 'Business Category is required.',
        'application.business_address_type_id.required' => 'Address Type is required.',
        'application.business_address_form_id.required' => 'Address Form is required.',
        'application.business_address_1.required' => 'Address 1 is required.',
        'application.business_address_2.required' => 'Address 2 is required.',
        'application.business_address_3.required' => 'Address 3 is required.',
        'application.business_province_id.required' => 'Province is required.',
        'application.business_city_id.required' => 'City is required.',
        'application.business_district_id.required' => 'District is required.',
        'application.business_tehsil_id.required' => 'Tehsil is required.',
        'application.business_capacity_id.required' => 'Capacity is required.',
        'application.business_share.required' => 'Share is required.',
        'application.business_acquisition_date.required' => 'Acquisition Date is required.',
        'application.business_contact_number.required' => 'Business Contact No. is required.',
        'application.business_email.required' => 'Email is required.',
        'application.business_email.email' => 'Email format is not valid.',

    ];

        if(isset($this->application['business_registration_status_id']) &&  $this->business_registration_status->firstWhere('id', $this->application['business_registration_status_id'])->name=='Registered'){
            $rules_business_profile['application.business_legal_status_id'] = 'required';
            $messages_business_profile['application.business_legal_status_id.required'] = 'Legal Status of Business is required';

            $rules_business_profile['application.business_registration_number'] = 'required';
            $messages_business_profile['application.business_registration_number.required'] = 'Business Registration Number is required';

            $rules_business_profile['application.business_registration_date'] = 'required';
            $messages_business_profile['application.business_registration_date.required'] = 'Business Registration Date is required';

            $rules_business_profile['application.business_ntn_no'] = 'required';
            $messages_business_profile['application.business_ntn_no.required'] = 'Business NTN is required';

            if(!isset($this->application['registration_certificate_file']) || empty($this->application['registration_certificate_file'])) {
                $rules_business_profile['registration_certificate_file'] = 'required|max:5120';
                $messages_business_profile['registration_certificate_file.required'] = 'Please Upload Registration Certificate.';
            }

        }

        if(!isset($this->application['proof_of_ownership_file']) || empty($this->application['proof_of_ownership_file'])) {
            $rules_business_profile['proof_of_ownership_file'] = 'required|max:5120';
            $messages_business_profile['proof_of_ownership_file.required'] = 'Please Upload Proof of Ownership.';
        }

        if(!isset($this->application['business_evidence_ownership_file']) || empty($this->application['business_evidence_ownership_file'])) {
            $rules_business_profile['business_evidence_ownership_file'] = 'required|max:5120';
            $messages_business_profile['business_evidence_ownership_file.required'] = 'Please Upload Proof of Ownership.';
        }

        $this->validate($rules_business_profile,$messages_business_profile);

        if(!empty($this->proof_of_ownership_file))
        $this->application['proof_of_ownership_file']= $this->proof_of_ownership_file->store('proof_of_ownerships','public');
        if(!empty($this->registration_certificate_file))
        $this->application['registration_certificate_file']= $this->registration_certificate_file->store('registration_certificates','public');
        if(!empty($this->license_registration_file))
        $this->application['license_registration_file']= $this->license_registration_file->store('license_registrations','public');
        if(!empty($this->business_evidence_ownership_file))
        $this->application['business_evidence_ownership_file']= $this->business_evidence_ownership_file->store('evidence_ownerships','public');

        //dd($this->application);
        $this->registration = tap($this->registration)->update($this->application);


        $this->step++;
        $this->successAlert();
    }

    public function submitUtilityConnections()
    {

       /* $rules_utility_connections = [
            'application.utility_connection_question_id' => 'required',
        ];
        $messages_utility_connections = [
            'application.utility_connection_question_id.required' => 'Please select your choice.',

        ];

        $this->validate($rules_utility_connections,$messages_utility_connections);*/

        if($this->isYes('utility_connection_question_id')){
            $this->validate([
                'utility_connections.*.utility_provider_other' => 'required',
                'utility_connections.*.utility_form_id' => 'required',
                'utility_connections.*.utility_consumer_number' => 'required',
                'utility_connections.*.utility_type_id' => 'required',
                'utility_connections.*.connection_ownership_id' => 'required',
            ],[
                'utility_connections.*.utility_provider_other.required' => 'Connection Ownership is required.',
                'utility_connections.*.utility_form_id.required' => 'Form/Type of Connection is required.',
                'utility_connections.*.utility_consumer_number.required' => 'Reference/ Consumer Number is required.',
                'utility_connections.*.utility_type_id.required' => 'Utility Type is required.',
                'utility_connections.*.connection_ownership_id.required' => 'Provider is required.',
            ]);
        }else{
            $this->utility_connections = [];
        }

        $this->registration = tap($this->registration)->update($this->application);


        if($this->registration->utilityConnections->isNotEmpty())
            $this->registration->utilityConnections()->delete();
        $connections = array();
        foreach ($this->utility_connections as $connection){
            if(isset($connection['utility_type_id']) && $connection['utility_type_id'])
                array_push($connections,new ApplicationUtilityConnection($connection));
        }
        if(count($connections)>0)
            $this->registration->utilityConnections()->saveMany($connections);

        $this->step++;
        $this->successAlert();
    }

    public function submitEmployeesInfo()
    {

        $rules_employees_info = [
            'application.employees_question_id' => 'required'
        ];
        $messages_employees_info = [
            'application.employees_question_id.required' => 'Please select your choice.',
        ];


        if($this->isYes('employees_question_id')){

            $total_employee_types = 0;
            foreach ($this->employees as $index=>$emp) {
                if(isset($emp['employee_type_id']) && $emp['employee_type_id']) {
                    $rules_employees_info["employees.$index.male"] = "required_without_all:employees.$index.female,employees.$index.transgender";
                    $rules_employees_info["employees.$index.female"] = "required_without_all:employees.$index.male,employees.$index.transgender";
                    $rules_employees_info["employees.$index.transgender"] = "required_without_all:employees.$index.male,employees.$index.female";

                    $messages_employees_info["employees.$index.male.required_without_all"]="The male field is required when none of female / transgender are present.";
                    $messages_employees_info["employees.$index.female.required_without_all"]="The female field is required when none of male / transgender are present.";
                    $messages_employees_info["employees.$index.transgender.required_without_all"]="The transgender field is required when none of male / transgender are present.";
                    $total_employee_types++;
                }
            }

            if(!$total_employee_types)
            $rules_employees_info['employees.0.employee_type_id'] = 'required';

        }else{
            $this->utility_connections = [];
        }

        $this->validate($rules_employees_info,$messages_employees_info);

        $this->registration = tap($this->registration)->update($this->application);

        if($this->registration->employeeInfos->isNotEmpty())
            $this->registration->employeeInfos()->delete();

        $employees = array();
        foreach ($this->employees as $employee){
            if(isset($employee['employee_type_id']) && $employee['employee_type_id'])
            array_push($employees,new ApplicationEmployeeInfo($employee));
        }
        if(count($employees)>0)
            $this->registration->employeeInfos()->saveMany($employees);


        $this->step++;
        $this->successAlert();
    }
    public function submitReview()
    {
        // $this->validate();
        //dd($this->application);
        $this->step++;
        session()->flash('success_message', 'Registration has been saved successfully.');
        return $this->redirect(route('applicant.applications.index'));
    }

    public function addUtilityConnection(){
        $this->validate([
            'utility_connections.*.utility_provider_other' => 'required',
            'utility_connections.*.utility_form_id' => 'required',
            'utility_connections.*.utility_consumer_number' => 'required',
            'utility_connections.*.utility_type_id' => 'required',
            'utility_connections.*.connection_ownership_id' => 'required',
        ],[
            'utility_connections.*.utility_provider_other.required' => 'Connection Ownership is required.',
            'utility_connections.*.utility_form_id.required' => 'Form/Type of Connection is required.',
            'utility_connections.*.utility_consumer_number.required' => 'Reference/ Consumer Number is required.',
            'utility_connections.*.utility_type_id.required' => 'Utility Type is required.',
            'utility_connections.*.connection_ownership_id.required' => 'Provider is required.',
        ]);
        $this->utility_connections[] = ['utility_provider_other'=>null, 'utility_form_id'=>null, 'utility_consumer_number'=>null, 'utility_type_id'=>null, 'connection_ownership_id'=>null,];
    }

    public function addTechnicalEducation(){
        $this->validate([
            'technical_educations.*.certificate_title' => 'required',
        ],[
            'technical_educations.*.certificate_title.required' => 'Diploma/ Certificate Title is required.',
        ]);
        $this->technical_educations[] = ['certificate_title'=>null];
    }

    public function removeUtilityConnection($index)
    {
        unset($this->utility_connections[$index]);
        $this->utility_connections = array_values($this->utility_connections);
    }

    public function removeTechnicalEducation($index)
    {
        unset($this->technical_educations[$index]);
        $this->technical_educations = array_values($this->technical_educations);
    }

    private function successAlert(){

        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
        $this->pageChangeDispatch();
    }

    private function pageChangeDispatch(){
        $this->dispatchBrowserEvent('page:tab',['change'=>true]);
    }

    private function isYes($key_name){
        return (isset($this->application[$key_name]) &&
            $this->questions->firstWhere('id', $this->application[$key_name])->name=='Yes');
    }

}
