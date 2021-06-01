<?php

namespace App\Http\Livewire;

use App\Models\AddressCapacity;
use App\Models\AddressForm;
use App\Models\AddressShare;
use App\Models\AddressType;
use App\Models\Application;
use App\Models\ApplicationUtilityConnection;
use App\Models\BusinessCategory;
use App\Models\BusinessLegalStatus;
use App\Models\BusinessRegistrationStatus;
use App\Models\BusinessSector;
use App\Models\BusinessSubSector;
use App\Models\City;
use App\Models\ConnectionOwnership;
use App\Models\Currency;
use App\Models\DesignationBusiness;
use App\Models\District;
use App\Models\EducationLevel;
use App\Models\FiscalYear;
use App\Models\MinorityStatus;
use App\Models\MobileCode;
use App\Models\Province;
use App\Models\Question;
use App\Models\Tehsil;
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
    public $address_forms;
    public $cities;
    public $districts;
    public $address_capacities;
    public $address_shares;
    public $business_registration_status;
    public $business_legal_statuses;
    public $business_categories;
    public $provinces;
    public $ownerships;
    public $utility_types;
    public $fiscal_years;
    public $currencies;

    public $employees;
    public $employee_types;

    public $employee_numbers;

    // UtilityConnections
    public $utility_connections = [];

    // on parent load
    public $business_secotors;
    public $business_sub_secotors;
    public $business_cities;
    public $business_districts;
    public $business_tehsils;

    public $is_minority_status = false;
    public $is_minority_status_other = false;
    public $is_technical_education = false;
    public $is_skilled_worker = false;
    public $is_business_registered = false;
    public $is_employee_info = false;

    // files
    public $proof_of_ownership_file,$registration_certificate_file,
        $license_registration_file,$business_evidence_ownership_file,
        $business_account_statement_file;


    public $step;
    private $stepActions = [
        'submitApplicantProfile',
        'submitBusinessProfile',
        'submitReview',
    ];

    public $registration;

    protected $rules_applicant_profile = [
        'application.prefix' => 'required',
        'application.first_name' => 'required|string',
        'application.last_name' => 'required|string',
        'application.cnic_no' => 'required',
        'application.gender' => 'required',
        'application.cnic_issue_date' => 'required',
        'application.cnic_expiry_date' => 'required',
        'application.date_of_birth' => 'required',
        'application.designation_business_id' => 'required',
        'application.minority_status_question_id' => 'required',
        'application.ntn_personal' => 'required',
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
        'application.residence_share_id' => 'required',
        'application.residence_acquisition_date' => 'required',
    ];
    protected $messages_applicant_profile = [
        'application.prefix.required' => 'Required.',
        'application.first_name.required' => 'First Name is required.',
        'application.last_name.required' => 'First Name is required.',
        'application.cnic_no.required' => 'CNIC is required.',
        'application.gender.required' => 'Gender is required.',
        'application.cnic_issue_date.required' => 'Issue Date is required.',
        'application.cnic_expiry_date.required' => 'Expiry Date is required.',
        'application.date_of_birth.required' => 'Date of Birth is required.',
        'application.designation_business_id.required' => 'Designation in Business is required.',
        'application.minority_status_question_id.required' => 'Please select your choice!',
        'application.ntn_personal.required' => 'NTN is required',
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
        'application.residence_share_id.required' => 'Share is required.',
        'application.residence_acquisition_date.required' => 'Acquisition Date is required.',
    ];
    protected $rules_business_profile = [
        'application.business_name' => 'required',
        'application.business_establishment_date' => 'required',
        'application.business_registration_status_id' => 'required',
        'application.business_category_id' => 'required',
        'application.business_sector_id' => 'required',
        'application.business_sub_sector_id' => 'required',
        'proof_of_ownership_file' => 'required|max:5120',
        'registration_certificate_file' => 'required|max:5120',
        'license_registration_file' => 'required|max:5120',
        'business_evidence_ownership_file' => 'required|max:5120',
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
        'application.business_share_id' => 'required',
        'application.business_acquisition_date' => 'required',
        'application.business_contact_number' => 'required',
        'application.business_email' => 'required|email',
        'application.utility_connection_question_id' => 'required',
        'application.employees_question_id' => 'required',
        'application.turnover_fiscal_year_id' => 'required',
        'application.annual_turnover' => 'required',
        'business_account_statement_file' => 'required|max:5120',
        'application.export_fiscal_year_id' => 'required',
        'application.export_annual_turnover' => 'required',
    ];
    protected $messages_business_profile = [
        'application.business_name.required' => 'Business Name is required.',
        'application.business_establishment_date.required' => 'Business Acquisition Date is required.',
        'application.business_registration_status_id.required' => 'Business Registration Status is required.',
        'application.business_category_id.required' => 'Business Category is required.',
        'application.business_sector_id.required' => 'Sector is required.',
        'application.business_sub_sector_id.required' => 'Sector is required.',
        'proof_of_ownership_file.required' => 'Please Upload Proof of Ownership.',
        'registration_certificate_file.required' => 'Please Upload Registration Certificate.',
        'license_registration_file.required' => 'Please License /Registration.',
        'business_evidence_ownership_file.required' => 'Please Evidence of tenancy/ ownership.',
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
        'application.business_share_id.required' => 'Share is required.',
        'application.business_acquisition_date.required' => 'Acquisition Date is required.',
        'application.business_contact_number.required' => 'Business Contact No. is required.',
        'application.business_email.required' => 'Email is required.',
        'application.business_email.email' => 'Email format is not valid.',
        'application.utility_connection_question_id.required' => 'Please select your choice.',
        'application.employees_question_id.required' => 'Please select your choice.',
        'application.turnover_fiscal_year_id.required' => 'Please select your choice.',
        'application.annual_turnover.required' => 'Annual Turnover is required.',
        'business_account_statement_file.required' => 'Please Upload Statement File.',
        'application.export_fiscal_year_id.required' => 'Please select your choice.',
        'application.export_annual_turnover.required' => 'Export Turnover is required.',


    ];

    public function mount()
    {
        $this->step = 0;
        $this->prefixes = ['Mr.','Ms.','Mrs.','Dr.'];
        $this->genders = ['Male', 'Female', 'Transgender'];

        $this->employee_types = ['permanent'=>'Permanent', 'contractual'=>'Contractual',
            'daily_wagers'=>'Daily Wagers',
            'daily_wagers_regular'=>'Daily Wagers (Regular)',
            'daily_wagers_unregistered'=>'Daily Wagers (Unregistered)',
            'piece_rate_workers_regular'=>'Piece Rate Workers (Regular)',
            'piece_rate_workers_unregistered'=>'Piece Rate Workers (Unregistered)'];


        $this->designations = DesignationBusiness::where('status',1)->get();
        $this->questions = Question::where('status',1)->get();
        $this->minority_status = MinorityStatus::where('status',1)->get();
        $this->education_level = EducationLevel::where('status',1)->get();
        $this->address_types = AddressType::where('type_status',1)->get();
        $this->address_forms = AddressForm::where('form_status',1)->get();
        $this->cities = City::where('city_status',1)->get();
        $this->districts = District::where('district_status',1)->where('province_id',7)->get();
        $this->address_capacities = AddressCapacity::where('capacity_status',1)->get();
        $this->address_shares = AddressShare::where('share_status',1)->get();
        $this->business_registration_status = BusinessRegistrationStatus::where('status',1)->get();
        $this->business_legal_statuses = BusinessLegalStatus::where('legal_status',1)->get();
        $this->business_categories = BusinessCategory::where('category_status',1)->get();
        $this->provinces = Province::where('province_status',1)->get();
        $this->ownerships = ConnectionOwnership::where('ownership_status',1)->get();
        $this->utility_types = UtilityType::where('type_status',1)->get();
        $this->fiscal_years = FiscalYear::where('year_status',1)->get();
        $this->currencies = Currency::where('currency_status',1)->get();

        $this->employee_numbers = 20;

        // on parent load
        $this->business_secotors = collect();
        $this->business_sub_secotors = collect();
        $this->business_cities = collect();
        $this->business_districts = collect();
        $this->business_tehsils = collect();

        $this->application['user_id'] = auth()->id();
        $this->application['prefix'] = auth()->user()->prefix;
        $this->application['first_name'] = auth()->user()->first_name;
        $this->application['last_name'] = auth()->user()->last_name;
        $this->application['middle_name'] = auth()->user()->middle_name;
        $this->application['last_name'] = auth()->user()->last_name;
        $this->application['cnic_no'] = auth()->user()->cnic_no;
        $mobile_code= MobileCode::where('id',auth()->user()->mobile_code_id)->first();
        $this->application['personal_mobile_no'] = ($mobile_code->code_number).auth()->user()->mobile_no;
        $this->application['personal_email'] = auth()->user()->email;

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
       /* if($this->step==0) {
            $this->validateOnly($propertyName,$this->rules_applicant_profile,$this->messages_applicant_profile);
        }else if($this->step==1){
            $this->validateOnly($propertyName,$this->rules_business_profile,$this->messages_business_profile);
        }*/
    }

    public function updatedApplication($value, $updatedKey)
    {
        switch ($updatedKey){
            case 'minority_status_question_id':
                    if($this->questions->firstWhere('id', $value)->name=='Yes'){
                        $this->is_minority_status = true;
                    }else{
                        $this->is_minority_status = false;
                    }
                break;
            case 'minority_status_id':
                if(isset($value) && !empty($value) && $this->minority_status->firstWhere('id', $value)->name=='Other'){
                    $this->is_minority_status_other = true;
                }else{
                    $this->is_minority_status_other = false;
                }
                break;
            case 'technical_education_question_id':
                if($this->questions->firstWhere('id', $value)->name=='Yes'){
                    $this->is_technical_education = true;
                }else{
                    $this->is_technical_education = false;
                }
                break;
                case 'skilled_worker_question_id':
                if($this->questions->firstWhere('id', $value)->name=='Yes'){
                    $this->is_skilled_worker = true;
                }else{
                    $this->is_skilled_worker = false;
                }
                break;

            case 'business_registration_status_id':
                if($this->business_registration_status->firstWhere('id', $value)->name=='Registered'){
                    $this->is_business_registered = true;
                }else{
                    $this->is_business_registered = false;
                }
                break;

            case 'business_category_id':
                $this->business_secotors = BusinessSector::where('business_category_id', $value)->where('sector_status',1)->get();
                break;
            case 'business_sector_id':
                $this->business_sub_secotors = BusinessSubSector::where('business_sector_id', $value)->where('sub_sector_status',1)->get();
                break;
            case 'business_province_id':
                $this->business_cities = City::where('city_province_id', $value)->where('city_status',1)->get();
                $this->business_districts = District::where('province_id', $value)->where('district_status',1)->get();
                break;
            case 'business_district_id':
                $this->business_tehsils = Tehsil::where('district_id', $value)->where('tehsil_status',1)->get();
                break;
            case 'utility_connection_question_id':
                if(isset($value) && !empty($value) && $this->questions->firstWhere('id', $value)->name=='Yes'){
                    $this->utility_connections = [['utility_provider_other'=>null, 'utility_form_id'=>null, 'utility_consumer_number'=>null, 'utility_type_id'=>null, 'connection_ownership_id'=>null,]];
                }else{
                    $this->utility_connections = [];
                }
                break;
            case 'employees_question_id':
                if($this->questions->firstWhere('id', $value)->name=='Yes'){
                    $this->is_employee_info = true;
                }else{
                    $this->is_employee_info = false;
                }
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
        $this->validate($this->rules_applicant_profile,$this->messages_applicant_profile);

        if($this->registration)
            $this->registration = tap($this->registration)->update($this->application);
        else
            $this->registration = Application::create($this->application);

        $this->step++;
        $this->successAlert();
    }

    public function submitBusinessProfile()
    {

        $this->validate($this->rules_business_profile,$this->messages_business_profile);

        if(!empty($this->proof_of_ownership_file))
        $this->application['proof_of_ownership_file']= $this->proof_of_ownership_file->store('proof_of_ownerships','public');
        if(!empty($this->registration_certificate_file))
        $this->application['registration_certificate_file']= $this->registration_certificate_file->store('registration_certificates','public');
        if(!empty($this->license_registration_file))
        $this->application['license_registration_file']= $this->license_registration_file->store('license_registrations','public');
        if(!empty($this->business_evidence_ownership_file))
        $this->application['business_evidence_ownership_file']= $this->business_evidence_ownership_file->store('evidence_ownerships','public');
        if(!empty($this->business_account_statement_file))
        $this->application['business_account_statement_file']= $this->business_account_statement_file->store('account_statements','public');


        //dd($this->application);
        $this->registration = tap($this->registration)->update($this->application);


        if($this->registration->utilityConnections()->count())
            $this->registration->utilityConnections()->delete();
        $connections = array();
        foreach ($this->utility_connections as $connection){
            array_push($connections,new ApplicationUtilityConnection($connection));
        }
        $this->registration->utilityConnections()->saveMany($connections);

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

    public function removeUtilityConnection($index)
    {
        unset($this->utility_connections[$index]);
        $this->utility_connections = array_values($this->utility_connections);
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



}
