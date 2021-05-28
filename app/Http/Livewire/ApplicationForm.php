<?php

namespace App\Http\Livewire;

use App\Models\AddressCapacity;
use App\Models\AddressForm;
use App\Models\AddressShare;
use App\Models\AddressType;
use App\Models\BusinessRegistrationStatus;
use App\Models\City;
use App\Models\DesignationBusiness;
use App\Models\District;
use App\Models\EducationLevel;
use App\Models\MinorityStatus;
use App\Models\MobileCode;
use App\Models\Question;
use Illuminate\Support\Arr;
use Livewire\Component;
use Manny\Manny;

class ApplicationForm extends Component
{
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

    public $is_minority_status = false;
    public $is_minority_status_other = false;
    public $is_technical_education = false;
    public $is_skilled_worker = false;


    public $step;
    private $stepActions = [
        'submitApplicantProfile',
        'submitBusinessProfile',
        'submitReview',
    ];

    private $rules_applicant_profile = [
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
    private $messages_applicant_profile = [
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

    private $rules_business_profile = [
        'application.business_name' => 'required',
        'application.business_acquisition_date' => 'required',
        'application.business_registration_status_id' => 'required',
    ];
    private $messages_business_profile = [
        'application.business_name.required' => 'Business Name is required.',
        'application.business_acquisition_date.required' => 'Business Acquisition Date is required.',
        'application.business_registration_status_id.required' => 'Business Registration Status is required.',
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
        $this->step++;
    }

    public function submitBusinessProfile()
    {
        $this->validate($this->rules_business_profile,$this->messages_business_profile);
        $this->step++;
        $this->successAlert();
    }

    public function submitReview()
    {
        // $this->validate();
        $this->step++;
    }

    private function successAlert(){

        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
    }



}
