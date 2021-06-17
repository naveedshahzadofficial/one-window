<?php

namespace App\Http\Livewire;

use App\Models\AddressCapacity;
use App\Models\AddressForm;
use App\Models\AddressType;
use App\Models\Application;
use App\Models\ApplicationDisability;
use App\Models\ApplicationEmployeeInfo;
use App\Models\ApplicationOtherDocument;
use App\Models\ApplicationTechnicalEducation;
use App\Models\ApplicationUtilityConnection;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\BusinessLegalStatus;
use App\Models\BusinessRegistrationStatus;
use App\Models\City;
use App\Models\ConnectionOwnership;
use App\Models\Currency;
use App\Models\DesignationBusiness;
use App\Models\Disability;
use App\Models\District;
use App\Models\EducationLevel;
use App\Models\EmployeeType;
use App\Models\FiscalYear;
use App\Models\Gender;
use App\Models\MinorityStatus;
use App\Models\Prefix;
use App\Models\Province;
use App\Models\Question;
use App\Models\Tehsil;
use App\Models\UtilityForm;
use App\Models\UtilityServiceProvider;
use App\Models\UtilityType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
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


    public $residence_cities;
    public $residence_districts;
    public $residence_tehsils;
    public $address_capacities;
    public $business_registration_status;
    public $business_legal_statuses;
    public $provinces;
    public $ownerships;
    public $utility_types;

    public $employees = [];
    public $employee_types;

    public $employee_numbers;

    public $business_categories;
    public $business_activities;

    public $fiscal_years;
    public $currencies;

    // UtilityConnections
    public $utility_forms;

    // Has Many Relations
    public $utility_connections = [['utility_provider_other'=>null, 'utility_form_id'=>null, 'utility_consumer_number'=>null, 'utility_type_id'=>null, 'connection_ownership_id'=>null,]];
    public $technical_educations = [['certificate_title'=>null]];
    public $business_other_files = [['document_title'=>null,'document_file'=>null]];
    public $disabilities = [['disability_id'=>null, 'disability_other'=>null, 'disability_certificate_file'=>null]];

    // on parent load
    public $business_cities;
    public $business_districts;
    public $business_tehsils;
    public $all_utility_service_providers;

    // Multiple Select2
    public $utility_service_providers= [];
    public $disability_options;

    public $is_minority_status = false;
    public $is_minority_status_other = false;
    public $is_skilled_worker = false;
    public $is_business_registered = false;
    public $is_employee_info = false;
    public $is_utility_connection = null;
    public $is_technical_education = false;
    public $is_annual_export = false;
    public $is_annual_import = false;
    public $is_cnic_lifetime = false;
    public $is_disability = false;

    // files
    public $proof_of_ownership_file,$registration_certificate_file,
        $license_registration_file,$business_evidence_ownership_file, $business_account_statement_file;


    public $tab_applicant_profile_is_completed = false;
    public $tab_business_profile_is_completed = false;
    public $tab_utility_connection_is_completed = false;
    public $tab_employees_info_is_completed = false;
    public $tab_annual_turnover_is_completed = false;

    public $accept_declaration;

    public $step;
    private $stepActions = [
        'submitApplicantProfile',
        'submitBusinessProfile',
        'submitUtilityConnections',
        'submitEmployeesInfo',
        'submitAnnualTurnover',
        'submitReview',
        'submission',
    ];

    public $tabsProgress = [
        'applicant_percentage'=>0,
        'business_percentage'=>0,
        'utility_percentage'=>0,
        'employee_percentage'=>0,
        'turnover_percentage'=>0,
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

        $this->address_capacities = AddressCapacity::where('capacity_status',1)->get();
        $this->business_registration_status = BusinessRegistrationStatus::where('status',1)->get();
        $this->business_legal_statuses = BusinessLegalStatus::where('legal_status',1)->get();

        $this->business_categories = BusinessCategory::where('category_status',1)->get();
        $this->business_activities = BusinessActivity::where('activity_status',1)->get();

        $this->provinces = Province::where('province_status',1)->get();
        $this->ownerships = ConnectionOwnership::where('ownership_status',1)->get();
        $this->utility_types = UtilityType::where('type_status',1)->get();

        $this->employee_types = EmployeeType::where('type_status',1)->get();

        $this->fiscal_years = FiscalYear::where('year_status',1)->get();
        $this->currencies = Currency::where('currency_status',1)->get();


        $this->employee_numbers = 20;

        // on parent load
        $this->residence_address_forms = collect();
        $this->residence_cities = collect();
        $this->residence_districts = collect();
        $this->residence_tehsils = collect();

        $this->business_address_forms = collect();
        $this->business_cities = collect();
        $this->business_districts = collect();
        $this->business_tehsils = collect();

        $this->all_utility_service_providers = UtilityServiceProvider::where('provider_status',1)->get();

        // mount multiple options
        $this->utility_service_providers[0] = UtilityServiceProvider::where('utility_form_id',2)->where('provider_status',1)->get();

        $this->disability_options = Disability::where('disability_status',1)->orderBy('disability_order')->get();

        $this->application['user_id'] = auth()->id();
        $this->application['prefix_id'] = auth()->user()->prefix_id;
        $this->application['first_name'] = auth()->user()->first_name;
        $this->application['last_name'] = auth()->user()->last_name;
        $this->application['middle_name'] = auth()->user()->middle_name;
        $this->application['last_name'] = auth()->user()->last_name;
        $this->application['cnic_no'] = auth()->user()->cnic_no;
        $this->application['personal_mobile_no'] = auth()->user()->mobile_no;
        $this->application['personal_email'] = auth()->user()->email;

        if($registration){
            $this->application = $registration->toArray();

            $this->technical_educations = $registration->technicalEducations->toArray();
            if(empty($this->technical_educations))
                $this->technical_educations = [['certificate_title'=>null]];

            $this->disabilities = $registration->disabilities->toArray();
            if(empty($this->disabilities))
                $this->disabilities = [['disability_id'=>null, 'disability_other'=>null, 'disability_certificate_file'=>null]];

            $this->business_other_files = $registration->otherDocuments->toArray();
            if(empty($this->business_other_files))
                $this->business_other_files = [['document_title'=>null,'document_file'=>null]];

            $this->utility_connections = $registration->utilityConnections->toArray();
            if(empty($this->utility_connections))
                $this->utility_connections = [['utility_provider_other'=>null, 'utility_form_id'=>null, 'utility_consumer_number'=>null, 'utility_type_id'=>null, 'connection_ownership_id'=>null,]];
            else{
                foreach ($this->utility_connections as $index=>$connection){
                    $this->utility_service_providers[$index] = UtilityServiceProvider::where('utility_form_id',$connection['utility_form_id'])->where('provider_status',1)->get();
                }

            }
            $this->employees = $registration->employeeInfos->toArray();
            $this->registration = $registration;
            $this->residence_address_forms = AddressForm::where('address_type_id',$registration->residence_address_type_id)->where('form_status',1)->get();
            $this->residence_cities = City::where('province_id', $registration->residence_province_id)->where('city_status',1)->get();
            $this->residence_districts = District::where('province_id', $registration->residence_province_id)->where('district_status',1)->get();
            $this->residence_tehsils = Tehsil::where('district_id', $registration->residence_district_id)->where('tehsil_status',1)->get();

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

            if($this->isYes('disability_question_id')){
                $this->is_disability = true;
            }


            if($this->isYes('skilled_worker_question_id')){
                $this->is_skilled_worker = true;
            }

            if(isset($this->application['business_registration_status_id']) &&  $this->business_registration_status->firstWhere('id', $this->application['business_registration_status_id'])->name=='Registered'){
                $this->is_business_registered = true;
            }

            if($this->isYes('utility_connection_question_id')){
                $this->is_utility_connection = true;
            }else{
                $this->is_utility_connection = false;
            }

            if($this->isYes('employees_question_id')){
                $this->is_employee_info = true;
            }

            if($this->isYes('export_question_id')){
                $this->is_annual_export = true;
            }
            if($this->isYes('import_question_id')){
                $this->is_annual_import = true;
            }
            if($this->isYes('cnic_expiry_question_id')){
                $this->is_cnic_lifetime = true;
            }
        }


    }
    public function render()
    {
        if($this->step==6){
            $this->validationCheck();
        }
        return view('livewire.application-form');
    }
    public function decreaseStep()
    {
        if($this->step>0)
        $this->step--;

        $this->pageChangeDispatch();
    }

    public function increaseStep()
    {
        if($this->step<7)
            $this->step++;

        $this->pageChangeDispatch();
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

            case 'residence_province_id':
                $this->application['residence_city_id'] = null;
                $this->application['residence_district_id'] = null;
                $this->residence_cities = City::where('province_id', $value)->where('city_status',1)->get();
                $this->residence_districts = District::where('province_id', $value)->where('district_status',1)->get();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->residence_cities,
                    'child_id'=>'#residence_city_id',
                    'field_name'=>'city_name_e',
                ]);
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->residence_districts,
                    'child_id'=>'#residence_district_id',
                    'field_name'=>'district_name_e',
                ]);
                $this->application['residence_tehsil_id'] = null;
                $this->residence_tehsils = collect();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->residence_tehsils,
                    'child_id'=>'#residence_tehsil_id',
                    'field_name'=>'tehsil_name_e',
                ]);
                break;

            case 'residence_district_id':
                $this->application['residence_tehsil_id'] = null;
                $this->residence_tehsils = Tehsil::where('district_id', $value)->where('tehsil_status',1)->get();
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->residence_tehsils,
                    'child_id'=>'#residence_tehsil_id',
                    'field_name'=>'tehsil_name_e',
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
    public function updatedUtilityConnections($value, $updatedKey)
    {
       $key_index = explode('.',$updatedKey);
        switch ($key_index[1]) {
            case 'utility_form_id':
                $this->utility_service_providers[$key_index[0]] = UtilityServiceProvider::where('utility_form_id',$value)->where('provider_status',1)->get();
                $this->application["utility_connections.$key_index[0].utility_service_provider_id"] = null;
                $this->dispatchBrowserEvent('child:select2',[
                    'data'=>$this->utility_service_providers[$key_index[0]],
                    'child_id'=>'#utility_service_provider_id_'.$key_index[0],
                    'field_name'=>'provider_name',
                    'key_name'=>"utility_connections.$key_index[0].utility_service_provider_id",
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
         $rules_applicant_profile = [
        'application.residence_share' => 'nullable|numeric|min:0|max:100',
    ];
         $messages_applicant_profile = [
        'application.residence_share.required' => 'Share is required.',
    ];

        if($this->isNo('cnic_expiry_question_id')){
            $rules_applicant_profile['application.cnic_expiry_date'] = 'required';
            $messages_applicant_profile['application.cnic_expiry_date.required'] = 'Expiry Date is required.';
        }

         if($this->isYes('minority_status_question_id')){
             $rules_applicant_profile['application.minority_status_id'] = 'required';
             $messages_applicant_profile['application.minority_status_id.required'] = 'Minority Status is required.';
         }

        if(isset($this->application['minority_status_id']) && $this->minority_status->firstWhere('id', $this->application['minority_status_id'])->name=='Other') {
            $rules_applicant_profile['application.minority_status_other'] = 'required';
            $messages_applicant_profile['application.minority_status_other.required'] = 'Minority Status Other is required.';
        }

        if($this->isYes('technical_education_question_id')){
            $rules_applicant_profile['technical_educations.*.certificate_title'] = 'required';
            $messages_applicant_profile['technical_educations.*.certificate_title.required'] = 'Diploma/ Certificate Title is required.';
        }else{
            $this->technical_educations = [['certificate_title'=>null]];
        }

        if($this->isYes('skilled_worker_question_id')){
            $rules_applicant_profile['application.skill_or_art'] = 'required';
            $messages_applicant_profile['application.skill_or_art.required'] = 'Skill or Art is required.';
        }
         //dd($rules_applicant_profile);

        $this->validate($rules_applicant_profile,$messages_applicant_profile);

        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        if($this->isYes('disability_question_id')) {
            $all_disabilities = array();
            foreach ($this->disabilities as $index=>$disability) {
                if (isset($disability['new_disability_certificate_file']) && !empty($disability['new_disability_certificate_file'])) {
                    $disability['disability_certificate_file'] = $disability['new_disability_certificate_file']->store('disability_certificates', 'public');
                    $disability['new_disability_certificate_file']=null;
                    //unset($disability['new_disability_certificate_file']);
                }
                if (isset($disability['disability_certificate_file']) && !empty($disability['disability_certificate_file']) &&
                    isset($disability['disability_id']) && !empty($disability['disability_id'])) {
                    array_push($all_disabilities, new ApplicationDisability($disability));
                    $this->disabilities[$index] = $disability;
                }
            }
            if ($this->registration->disabilities->isNotEmpty())
                $this->registration->disabilities()->delete();

            if (count($all_disabilities) > 0)
                $this->registration->disabilities()->saveMany($all_disabilities);
        }else{
            $this->disabilities = [['disability_id'=>null, 'disability_other'=>null, 'disability_certificate_file'=>null]];
        }


        if($this->registration->technicalEducations->isNotEmpty())
            $this->registration->technicalEducations()->delete();

        $educations = array();
        foreach ($this->technical_educations as $education){
            if(isset($education['certificate_title']) && !empty($education['certificate_title']))
            array_push($educations,new ApplicationTechnicalEducation($education));
        }
        if(count($educations)>0)
        $this->registration->technicalEducations()->saveMany($educations);

        $this->successAlert();
    }
    public function submitBusinessProfile()
    {

         $rules_business_profile = [
        'application.business_share' => 'nullable|numeric|min:0|max:100',
        'application.business_email' => 'nullable|email',
    ];
         $messages_business_profile = [
        'application.business_email.email' => 'Email format is not valid.',
         ];



        if(!empty($this->proof_of_ownership_file)) {
            $rules_business_profile['proof_of_ownership_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_business_profile['proof_of_ownership_file.mimes'] = 'Proof of Ownership must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->license_registration_file)) {
            $rules_business_profile['license_registration_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_business_profile['license_registration_file.mimes'] = 'License /Registration must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->business_evidence_ownership_file)) {
            $rules_business_profile['business_evidence_ownership_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_business_profile['business_evidence_ownership_file.mimes'] = 'Evidence of Ownership must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->registration_certificate_file)) {
            $rules_business_profile['registration_certificate_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_business_profile['registration_certificate_file.mimes'] = 'Registration Certificate must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(isset($this->business_other_files) && !empty($this->business_other_files)){
            foreach ($this->business_other_files as $index=>$bof){
                if(isset($bof['new_document_file']) && !empty($bof['new_document_file'])){
                $rules_business_profile["business_other_files.$index.new_document_file"] = 'mimes:jpg,jpeg,png,pdf|max:5120';
                $messages_business_profile["business_other_files.$index.new_document_file.mimes"] = 'The document file must be a file of type: jpg, jpeg, png, pdf.';
                }
            }
        }

        $this->validate($rules_business_profile,$messages_business_profile);

        if(!empty($this->proof_of_ownership_file)) {
            $this->application['proof_of_ownership_file'] = $this->proof_of_ownership_file->store('proof_of_ownerships', 'public');
            $this->proof_of_ownership_file = null;
        }
        if(!empty($this->registration_certificate_file)) {
            $this->application['registration_certificate_file'] = $this->registration_certificate_file->store('registration_certificates', 'public');
            $this->registration_certificate_file = null;
        }
        if(!empty($this->license_registration_file)) {
            $this->application['license_registration_file'] = $this->license_registration_file->store('license_registrations', 'public');
            $this->license_registration_file = null;
        }
        if(!empty($this->business_evidence_ownership_file)) {
            $this->application['business_evidence_ownership_file'] = $this->business_evidence_ownership_file->store('evidence_ownerships', 'public');
            $this->business_evidence_ownership_file = null;
        }

        $other_documents = array();

        foreach ($this->business_other_files as $business_other_file){
            if(isset($business_other_file['new_document_file']) && !empty($business_other_file['new_document_file'])){
                $business_other_file['document_file'] = $business_other_file['new_document_file']->store('business_other_documents', 'public');
                unset($business_other_file['new_document_file']);
            }
            if(isset($business_other_file['document_file']) && !empty($business_other_file['document_file']) &&
               isset($business_other_file['document_title']) && !empty($business_other_file['document_title']))
            array_push($other_documents, new ApplicationOtherDocument($business_other_file));
        }

        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        if($this->registration->otherDocuments->isNotEmpty())
            $this->registration->otherDocuments()->delete();

        if(count($other_documents)>0)
            $this->registration->otherDocuments()->saveMany($other_documents);

        $this->successAlert();
    }
    public function submitUtilityConnections()
    {
        $rules_utility_connections = array();
        $messages_utility_connections = array();

        foreach ($this->utility_connections as $index=>$conn){
            if(isset($conn['new_bill_file']) && !empty($conn['new_bill_file'])){
                    $rules_utility_connections["utility_connections.$index.new_bill_file"] = 'mimes:jpg,jpeg,png,pdf|max:5120';
                    $messages_utility_connections["utility_connections.$index.new_bill_file.mimes"] = 'Utility bill must be a file of type: jpg, jpeg, png, pdf.';
            }
            if($this->isNo('utility_connection_question_id') || $index>0){
                $rules_utility_connections["utility_connections.$index.utility_form_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_form_id.required"] = 'Type of Utility is required.';
            }
            if($this->isYes('utility_connection_question_id') || $this->isNo('utility_connection_question_id')){
                $rules_utility_connections["utility_connections.$index.utility_type_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_type_id.required"] = 'Type of Connection is required.';

                $rules_utility_connections["utility_connections.$index.connection_ownership_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.connection_ownership_id.required"] = 'Connection Ownership is required.';

                $rules_utility_connections["utility_connections.$index.utility_consumer_number"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_consumer_number.required"] = 'Reference/ Consumer Number is required.';

                $rules_utility_connections["utility_connections.$index.utility_service_provider_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_service_provider_id.required"] = 'Service Provider is required.';

                $rules_utility_connections["utility_connections.$index.connection_date"] = 'required';
                $messages_utility_connections["utility_connections.$index.connection_date.required"] = 'Connection Date is required.';

                if(!isset($conn['bill_file']) || empty($conn['bill_file'])){
                    $rules_utility_connections["utility_connections.$index.new_bill_file"] = 'required';
                    $messages_utility_connections["utility_connections.$index.new_bill_file.required"] = 'Paid Utility bill is required.';
                }
                $this->validate($rules_utility_connections,$messages_utility_connections);
            }
         }



        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);


        $connections = array();
        foreach ($this->utility_connections as $index=>$connection){
            if(isset($connection['new_bill_file']) && !empty($connection['new_bill_file'])){
                $connection['bill_file'] = $connection['new_bill_file']->store('utility_bills', 'public');
                $connection['new_bill_file'] = null;
                //unset($connection['new_bill_file']);
            }

            if(!isset($connection['utility_form_id']) || empty($connection['utility_form_id']))
                $connection['utility_form_id'] = 2;

            if( isset($connection['bill_file']) && !empty($connection['bill_file']) &&
                isset($connection['utility_type_id']) && !empty($connection['utility_type_id']))
            array_push($connections,new ApplicationUtilityConnection($connection));
        }

        if($this->registration->utilityConnections->isNotEmpty())
            $this->registration->utilityConnections()->delete();

        if(count($connections)>0)
            $this->registration->utilityConnections()->saveMany($connections);

        $this->successAlert();
    }
    public function submitEmployeesInfo()
    {

        if($this->isYes('employees_question_id')){
            $total_employee_types = 0;
            $rules_employees_info = [];
            $messages_employees_info = [];
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

            $this->validate($rules_employees_info,$messages_employees_info);
        }

        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        if($this->registration->employeeInfos->isNotEmpty())
            $this->registration->employeeInfos()->delete();

        if($this->isYes('employees_question_id')) {
            $employees = array();
            foreach ($this->employees as $employee) {
                if (isset($employee['employee_type_id']) && $employee['employee_type_id'])
                    array_push($employees, new ApplicationEmployeeInfo($employee));
            }

            if (count($employees) > 0)
                $this->registration->employeeInfos()->saveMany($employees);
        }else{
            $this->employees = [];
        }


        $this->successAlert();
    }
    public function submitAnnualTurnover()
    {
        $rules_annual_turnover['business_account_statement_file'] = 'nullable|mimes:jpg,jpeg,png,pdf|max:5120';
        $messages_annual_turnover['business_account_statement_file.mimes'] = 'Please Upload Business Account Statement.';
        $this->validate($rules_annual_turnover,$messages_annual_turnover);

        if(isset($this->business_account_statement_file) && !empty($this->business_account_statement_file)) {
            $this->application['business_account_statement_file'] = $this->business_account_statement_file->store('business_account_statements', 'public');
            $this->business_account_statement_file = null;
        }

        if(!$this->isYes('export_question_id')){
            $this->application['export_fiscal_year_id'] = null;
            $this->application['export_currency_id'] = null;
            $this->application['export_annual_turnover'] = null;
        }

        if(!$this->isYes('import_question_id')){
            $this->application['import_fiscal_year_id'] = null;
            $this->application['import_currency_id'] = null;
            $this->application['import_annual_turnover'] = null;
        }

        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        $this->successAlert();
    }
    public function submitReview()
    {
        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        $this->successAlert();
    }
    public function submission(){

        $rules = [
            'accept_declaration' => 'required',
        ];
        $messages = [
            'accept_declaration.required' => 'Please accept the accept declaration.',

        ];
        $this->validate($rules,$messages);

        if(!isset($this->registration['submitted_at']) || empty($this->registration['submitted_at']))
            $this->registration['submitted_at'] = Carbon::now();


        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);



        session()->flash('success_message', 'Registration has been saved successfully.');
        return $this->redirect(route('applicant.applications.index'));
    }

    public function addUtilityConnection(){
        $this->validate([
            'utility_connections.*.utility_type_id' => 'required',
            'utility_connections.*.connection_ownership_id' => 'required',
            'utility_connections.*.utility_consumer_number' => 'required',
            'utility_connections.*.utility_service_provider_id' => 'required',
            'utility_connections.*.connection_date' => 'required',
        ],[
            'utility_connections.*.utility_service_provider_id.required' => 'Connection Ownership is required.',
            'utility_connections.*.utility_form_id.required' => 'Form/Type of Connection is required.',
            'utility_connections.*.utility_consumer_number.required' => 'Reference/ Consumer Number is required.',
            'utility_connections.*.utility_type_id.required' => 'Utility Type is required.',
            'utility_connections.*.connection_ownership_id.required' => 'Provider is required.',
        ]);
        $this->utility_connections[] = ['utility_type_id'=>null,'utility_form_id'=>null,'connection_ownership_id'=>null,'utility_consumer_number'=>null, 'utility_service_provider_id'=>null,  'connection_date'=>null, 'bill_file'=>null];
        $this->dispatchBrowserEvent('reinitialization:utility',['id'=>(count($this->utility_connections)-1)]);
    }
    public function addTechnicalEducation(){
        $this->validate([
            'technical_educations.*.certificate_title' => 'required',
        ],[
            'technical_educations.*.certificate_title.required' => 'Diploma/ Certificate Title is required.',
        ]);
        $this->technical_educations[] = ['certificate_title'=>null];
    }
    public function addOtherDocument(){
        $this->validate([
            'business_other_files.*.document_title' => 'required',
            'business_other_files.*.new_document_file' => 'mimes:jpg,jpeg,png,pdf|max:5120',
        ],[
            'business_other_files.*.document_title.required' => 'Other Document Title is required.',
            'business_other_files.*.new_document_file.mimes' => 'The document file must be a file of type: jpg, jpeg, png, pdf.',
        ]);
        $this->business_other_files[] = ['document_title'=>null,'document_file'=>null];
    }
    public function addDisability(){
        $current_index = count($this->disabilities)-1;

        $this->validate([
            "disabilities.$current_index.disability_id" => 'required',
            "disabilities.$current_index.new_disability_certificate_file" => 'mimes:jpg,jpeg,png,pdf|max:5120',
        ],[
            "disabilities.$current_index.disability_id.required" => 'Disability is required.',
            "disabilities.$current_index.new_disability_certificate_file.required" => 'Disability Certificate is required.',
            "disabilities.$current_index.new_disability_certificate_file.mimes" => 'Disability Certificate must be a file of type: jpg, jpeg, png, pdf.',
        ]);
        $this->disabilities[] = ['disability_id'=>null, 'disability_other'=>null, 'disability_certificate_file'=>null];

        $next_index = $current_index+1;
        $disability_id = "#disability_id_$next_index";
        $disability_key_name = "disabilities.$next_index.disability_id";
        $this->dispatchBrowserEvent('reinitialization:select2',['id'=>$disability_id,'key_name'=>$disability_key_name]);
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
    public function removeOtherDocument($index)
    {
        unset($this->business_other_files[$index]);
        $this->business_other_files = array_values($this->business_other_files);
    }
    public function removeDisability($index)
    {
        unset($this->disabilities[$index]);
        $this->disabilities = array_values($this->disabilities);
    }

    private function successAlert(){

        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
    }
    private function pageChangeDispatch(){
        $this->dispatchBrowserEvent('page:tab',['change'=>true]);
    }
    private function isYes($key_name){
        return (isset($this->application[$key_name]) &&
            $this->questions->firstWhere('id', $this->application[$key_name])->name=='Yes');
    }
    private function isNo($key_name){
        return (isset($this->application[$key_name]) &&
            $this->questions->firstWhere('id', $this->application[$key_name])->name=='No');
    }

    public function validationCheck(){
        /* Start Applicant Profile Validation Rules */

        $rules_applicant_profile = [
            'application.prefix_id' => 'required',
            'application.first_name' => 'required|string',
            'application.last_name' => 'required|string',
            'application.cnic_no' => 'required',
            'application.gender_id' => 'required',
            'application.cnic_issue_date' => 'required',
            'application.cnic_expiry_question_id' => 'required',
            'application.date_of_birth' => 'required',
            'application.designation_business_id' => 'required',
            'application.minority_status_question_id' => 'required',
            'application.active_taxpayer_question_id' => 'required',
            'application.education_level_id' => 'required',
            'application.disability_question_id' => 'required',
            'application.technical_education_question_id' => 'required',
            'application.skilled_worker_question_id' => 'required',
            'application.residence_address_type_id' => 'required',
            'application.residence_address_form_id' => 'required',
            'application.residence_address_1' => 'required',
            'application.residence_address_2' => 'required',
            'application.residence_address_3' => 'required',
            'application.residence_province_id' => 'required',
            'application.residence_city_id' => 'required',
            'application.residence_district_id' => 'required',
            'application.residence_tehsil_id' => 'required',
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
            'application.cnic_expiry_question_id.required' => 'Please select your choice!',
            'application.date_of_birth.required' => 'Date of Birth is required.',
            'application.designation_business_id.required' => 'Designation in Business is required.',
            'application.minority_status_question_id.required' => 'Please select your choice!',
            'application.active_taxpayer_question_id.required' => 'Please select your choice!',
            'application.education_level_id.required' => 'Education Level is required',
            'application.disability_question_id.required' => 'Please select your choice',
            'application.technical_education_question_id.required' => 'Please select your choice',
            'application.skilled_worker_question_id.required' => 'Please select your choice!',
            'application.residence_address_type_id.required' => 'Type is required.',
            'application.residence_address_form_id.required' => 'Form is required.',
            'application.residence_address_1.required' => 'Address 1 is required.',
            'application.residence_address_2.required' => 'Address 2 is required.',
            'application.residence_address_3.required' => 'Address 3 is required.',
            'application.residence_province_id.required' => 'Province is required.',
            'application.residence_city_id.required' => 'City is required.',
            'application.residence_district_id.required' => 'District is required.',
            'application.residence_tehsil_id.required' => 'Tehsil is required.',
            'application.residence_capacity_id.required' => 'Capacity is required.',
            'application.residence_share.required' => 'Share is required.',
            'application.residence_acquisition_date.required' => 'Acquisition Date is required.',
        ];

        if($this->isNo('cnic_expiry_question_id')){
            $rules_applicant_profile['application.cnic_expiry_date'] = 'required';
            $messages_applicant_profile['application.cnic_expiry_date.required'] = 'Expiry Date is required.';
        }

        if($this->isYes('minority_status_question_id')){
            $rules_applicant_profile['application.minority_status_id'] = 'required';
            $messages_applicant_profile['application.minority_status_id.required'] = 'Minority Status is required.';
        }

        if(isset($this->application['minority_status_id']) && $this->minority_status->firstWhere('id', $this->application['minority_status_id'])->name=='Other') {
            $rules_applicant_profile['application.minority_status_other'] = 'required';
            $messages_applicant_profile['application.minority_status_other.required'] = 'Minority Status Other is required.';
        }

        if($this->isYes('disability_question_id')) {
            foreach ($this->disabilities as $index=>$disability) {

                $rules_applicant_profile["disabilities.$index.disability_id"] = 'required';
                $messages_applicant_profile["disabilities.$index.disability_id.required"] = 'Disability is required.';

                if((!isset($disability['disability_certificate_file']) || empty($disability['disability_certificate_file'])) && empty($disability['new_disability_certificate_file'])){
                    $rules_applicant_profile["disabilities.$index.new_disability_certificate_file"] = 'required|mimes:jpg,jpeg,png,pdf|max:5120';
                    $messages_applicant_profile["disabilities.$index.new_disability_certificate_file.required"] = 'Disability Certificate is required.';
                }

            }
        }

        if($this->isYes('technical_education_question_id')){
            $rules_applicant_profile['technical_educations.*.certificate_title'] = 'required';
            $messages_applicant_profile['technical_educations.*.certificate_title.required'] = 'Diploma/ Certificate Title is required.';
        }

        if($this->isYes('skilled_worker_question_id')){
            $rules_applicant_profile['application.skill_or_art'] = 'required';
            $messages_applicant_profile['application.skill_or_art.required'] = 'Skill or Art is required.';
        }


        $validator = Validator::make(((array)$this),$rules_applicant_profile, $messages_applicant_profile);

        if($validator->fails()) {
            $this->tab_applicant_profile_is_completed = false;
            $this->tabsProgress['applicant_percentage'] = $this->findTabPercentage(count($rules_applicant_profile),$validator->errors()->count());
        }else {
            $this->tab_applicant_profile_is_completed = true;
            $this->tabsProgress['applicant_percentage'] = 100;
        }
        //dd($validator->errors()->first());
        //dd($this->tab_employees_info_is_completed);

        /* End Applicant Profile Rules */

        /* Start Business Profile Validation Rules */

        $rules_business_profile = [
            'application.business_name' => 'required',
            'application.business_establishment_date' => 'required',
            'application.business_registration_status_id' => 'required',
            'application.business_category_id' => 'required',
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
            'application.business_category_id.required' => 'Business Category is required.',
            'application.business_activity_id.required' => 'Business Sector is required.',
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

            // $rules_business_profile['application.business_ntn_no'] = 'required';
            //$messages_business_profile['application.business_ntn_no.required'] = 'Business NTN is required';

            if((!isset($this->application['registration_certificate_file']) || empty($this->application['registration_certificate_file']))  && empty($this->registration_certificate_file)) {
                $rules_business_profile['registration_certificate_file'] = 'required|mimes:jpg,jpeg,png,pdf|max:5120';
                $messages_business_profile['registration_certificate_file.required'] = 'Please Upload Registration Certificate.';
            }

        }

        if((!isset($this->application['proof_of_ownership_file']) || empty($this->application['proof_of_ownership_file']))  && empty($this->proof_of_ownership_file)) {
            $rules_business_profile['proof_of_ownership_file'] = 'required|mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_business_profile['proof_of_ownership_file.required'] = 'Please Upload Proof of Ownership.';
        }

        if((!isset($this->application['business_evidence_ownership_file']) || empty($this->application['business_evidence_ownership_file']))  && empty($this->business_evidence_ownership_file)) {
            $rules_business_profile['business_evidence_ownership_file'] = 'required|mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_business_profile['business_evidence_ownership_file.required'] = 'Please Upload Business Evidence of Ownership.';
        }


        $validator = Validator::make(((array)$this),$rules_business_profile, $messages_business_profile);

        if($validator->fails()) {
            $this->tab_business_profile_is_completed = false;
            $this->tabsProgress['business_percentage'] = $this->findTabPercentage(count($rules_business_profile),$validator->errors()->count());
        }else {
            $this->tab_business_profile_is_completed = true;
            $this->tabsProgress['business_percentage'] = 100;
        }
        /* End Business Profile Rules */



        /* Start Utility Connections Validation Rules */
        $rules_utility_connections = [
            'application.utility_connection_question_id' => 'required',
        ];
        $messages_utility_connections = [
            'application.utility_connection_question_id.required' => 'Please select your choice.',

        ];

        foreach ($this->utility_connections as $index=>$conn){

            if($this->isNo('utility_connection_question_id') || $index>0){
                $rules_utility_connections["utility_connections.$index.utility_form_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_form_id.required"] = 'Type of Utility is required.';
            }
            if($this->isYes('utility_connection_question_id') || $this->isNo('utility_connection_question_id')){
                $rules_utility_connections["utility_connections.$index.utility_type_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_type_id.required"] = 'Type of Connection is required.';

                $rules_utility_connections["utility_connections.$index.connection_ownership_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.connection_ownership_id.required"] = 'Connection Ownership is required.';

                $rules_utility_connections["utility_connections.$index.utility_consumer_number"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_consumer_number.required"] = 'Reference/ Consumer Number is required.';

                $rules_utility_connections["utility_connections.$index.utility_service_provider_id"] = 'required';
                $messages_utility_connections["utility_connections.$index.utility_service_provider_id.required"] = 'Service Provider is required.';

                $rules_utility_connections["utility_connections.$index.connection_date"] = 'required';
                $messages_utility_connections["utility_connections.$index.connection_date.required"] = 'Connection Date is required.';

                if((!isset($conn['bill_file']) || empty($conn['bill_file'])) && empty($conn['new_bill_file'])){
                    $rules_utility_connections["utility_connections.$index.new_bill_file"] = 'required';
                    $messages_utility_connections["utility_connections.$index.new_bill_file.required"] = 'Paid Utility bill is required.';
                }
            }
        }


        $validator = Validator::make(((array)$this),$rules_utility_connections, $messages_utility_connections);

        if($validator->fails()) {
            $this->tab_utility_connection_is_completed = false;
            $this->tabsProgress['utility_percentage'] = $this->findTabPercentage(count($rules_utility_connections),$validator->errors()->count());
        }else {
            $this->tab_utility_connection_is_completed = true;
            $this->tabsProgress['utility_percentage'] = 100;
        }
        /* End Utility Connections Rules */



        /* Start Employees Info Validation Rules */

        $rules_employees_info = [
            'application.employees_question_id' => 'required'
        ];
        $messages_employees_info = [
            'application.employees_question_id.required' => 'Please select your choice.',
        ];

        if($this->isYes('employees_question_id')){
            $total_employee_types = 0;
            foreach ($this->employees as $index=>$emp) {
                if(isset($emp['employee_type_id']) && !empty($emp['employee_type_id'])) {
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
        }

        $validator = Validator::make(((array)$this),$rules_employees_info, $messages_employees_info);

        if($validator->fails()) {
            $this->tab_employees_info_is_completed = false;
            $this->tabsProgress['employee_percentage'] = $this->findTabPercentage(count($rules_employees_info),$validator->errors()->count());
        }else {
            $this->tab_employees_info_is_completed = true;
            $this->tabsProgress['employee_percentage'] = 100;
        }

        /* End Employees Info Rules */

        /* Start Annual Turnover Validation Rules */
        $rules_annual_turnover = [
            'application.turnover_fiscal_year_id' => 'required',
            'application.annual_turnover' => 'required',
            'application.export_question_id' => 'required',
            'application.import_question_id' => 'required',
        ];
        $messages_annual_turnover= [
            'application.turnover_fiscal_year_id.required' => 'Please select the fiscal year.',
            'application.annual_turnover.required' => 'Annual Turnover is required.',
            'application.export_question_id.required' => 'Please select your choice.',
            'application.import_question_id.required' => 'Please select your choice.',
        ];


        if((!isset($this->application['business_account_statement_file']) || empty($this->application['business_account_statement_file'])) && empty($this->business_account_statement_file)){
            $rules_annual_turnover['business_account_statement_file'] = 'required|mimes:jpg,jpeg,png,pdf|max:5120';
            $messages_annual_turnover['business_account_statement_file.required'] = 'Please Upload Business Account Statement.';
        }

        if($this->isYes('export_question_id')){

            $rules_annual_turnover['application.export_fiscal_year_id'] = 'required';
            $messages_annual_turnover['application.export_fiscal_year_id.required'] = 'Please select export fiscal year.';

            $rules_annual_turnover['application.export_currency_id'] = 'required';
            $messages_annual_turnover['application.export_currency_id.required'] = 'Currency is required.';

            $rules_annual_turnover['application.export_annual_turnover'] = 'required';
            $messages_annual_turnover['application.export_annual_turnover.required'] = 'Export Turnover is required.';
        }

        if($this->isYes('import_question_id')){

            $rules_annual_turnover['application.import_fiscal_year_id'] = 'required';
            $messages_annual_turnover['application.import_fiscal_year_id.required'] = 'Please select import fiscal year.';

            $rules_annual_turnover['application.import_currency_id'] = 'required';
            $messages_annual_turnover['application.import_currency_id.required'] = 'Currency is required.';

            $rules_annual_turnover['application.import_annual_turnover'] = 'required';
            $messages_annual_turnover['application.import_annual_turnover.required'] = 'Import Turnover is required.';
        }

        $validator = Validator::make(((array)$this),$rules_annual_turnover, $messages_annual_turnover);
        if($validator->fails()) {
            $this->tab_annual_turnover_is_completed = false;
            $this->tabsProgress['turnover_percentage'] = $this->findTabPercentage(count($rules_annual_turnover),$validator->errors()->count());
        }else {
            $this->tab_annual_turnover_is_completed = true;
            $this->tabsProgress['turnover_percentage'] = 100;
        }
        /* End Annual Turnover Rules */
    }

    private function findTabPercentage($total_fields,$in_completed){
        $completed = $total_fields - $in_completed;
        return $total_fields>0?round(($completed/$total_fields) * 100,2):100;
    }

}
