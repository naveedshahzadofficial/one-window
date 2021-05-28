<?php

namespace App\Http\Livewire;

use App\Models\AddressCapacity;
use App\Models\AddressForm;
use App\Models\AddressShare;
use App\Models\AddressType;
use App\Models\BusinessCategory;
use App\Models\BusinessLegalStatus;
use App\Models\BusinessRegistrationStatus;
use App\Models\BusinessSector;
use App\Models\BusinessSubSector;
use App\Models\City;
use App\Models\DesignationBusiness;
use App\Models\District;
use App\Models\EducationLevel;
use App\Models\MinorityStatus;
use App\Models\MobileCode;
use App\Models\Question;
use Livewire\Component;
use Livewire\WithFileUploads;
use Manny\Manny;

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

    // on parent load
    public $business_secotors;
    public $business_sub_secotors;

    public $is_minority_status = false;
    public $is_minority_status_other = false;
    public $is_technical_education = false;
    public $is_skilled_worker = false;
    public $is_business_registered = false;

    // files
    public $proof_of_ownership_file,$registration_certificate_file,$license_registration_file;


    public $step;
    private $stepActions = [
        'submitApplicantProfile',
        'submitBusinessProfile',
        'submitReview',
    ];

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
        'application.business_acquisition_date' => 'required',
        'application.business_registration_status_id' => 'required',
        'application.business_category_id' => 'required',
        'application.business_sector_id' => 'required',
        'application.business_sub_sector_id' => 'required',
        'proof_of_ownership_file' => 'required|max:5120',
        'registration_certificate_file' => 'required|max:5120',
        'license_registration_file' => 'required|max:5120',
    ];

    protected $messages_business_profile = [
        'application.business_name.required' => 'Business Name is required.',
        'application.business_acquisition_date.required' => 'Business Acquisition Date is required.',
        'application.business_registration_status_id.required' => 'Business Registration Status is required.',
        'application.business_category_id.required' => 'Business Category is required.',
        'application.business_sector_id.required' => 'Sector is required.',
        'application.business_sub_sector_id.required' => 'Sector is required.',
        'proof_of_ownership_file.required' => 'Please Upload Proof of Ownership.',
        'registration_certificate_file.required' => 'Please Upload Registration Certificate.',
        'license_registration_file.required' => 'Please License /Registration.',
    ];

    public function mount()
    {
        $this->step = 1;
        $this->prefixes = ['Mr.','Ms.','Mrs.','Dr.'];
        $this->genders = ['Male', 'Female', 'Transgender'];
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

        // on parent load
        $this->business_secotors = collect();
        $this->business_sub_secotors = collect();

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
        $this->step--;
    }
    public function updated($propertyName)
    {
        if($this->step==0) {
            $this->validateOnly($propertyName,$this->rules_applicant_profile,$this->messages_applicant_profile);
        }else if($this->step==1){
            $this->validateOnly($propertyName,$this->rules_business_profile,$this->messages_business_profile);
        }
    }

    public function updatedApplication($value, $updatedKey)
    {
        switch ($updatedKey){
            case 'cnic_no':
                $this->application['cnic_no'] = Manny::mask($value, "11111-1111111-1");
                break;
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
        //$this->validate($this->rules_applicant_profile,$this->messages_applicant_profile);
        $this->step++;
        $this->successAlert();
    }

    public function submitBusinessProfile()
    {

        if(!empty($this->proof_of_ownership_file))
        $this->application['proof_of_ownership_file']= $this->proof_of_ownership_file->store('proof_of_ownerships');
        if(!empty($this->registration_certificate_file))
        $this->application['registration_certificate_file']= $this->registration_certificate_file->store('registration_certificates');
        if(!empty($this->license_registration_file))
        $this->application['license_registration_file']= $this->license_registration_file->store('license_registrations');

        //$this->validate($this->rules_business_profile,$this->messages_business_profile);
        dd($this->application);
        $this->step++;
        $this->successAlert();
    }

    public function submitReview()
    {
        // $this->validate();
        $this->step++;
        session()->flash('success_message', 'Registration has been saved successfully.');
        return $this->redirect(route('applicant.applications.index'));
    }

    private function successAlert(){

        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
    }



}
