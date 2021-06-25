<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model implements Auditable
{
    use HasFactory, SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = ['registration_no', 'prefix_id', 'first_name', 'middle_name', 'last_name', 'gender_id', 'cnic_no',
        'cnic_issue_date', 'cnic_expiry_question_id', 'cnic_expiry_date', 'date_of_birth', 'designation_business_id', 'minority_status_question_id',
        'minority_status_id', 'minority_status_other', 'active_taxpayer_question_id', 'ntn_personal','disability_question_id', 'education_level_id', 'technical_education_question_id',
        'certificate_title', 'skilled_worker_question_id', 'skill_or_art', 'residence_address_type_id',
        'residence_address_form_id', 'residence_address_1', 'residence_address_2', 'residence_address_3',
        'residence_province_id','residence_city_id', 'residence_district_id','residence_tehsil_id', 'residence_capacity_id', 'residence_share', 'residence_acquisition_date',
        'personal_mobile_no', 'personal_email',
        'business_name', 'business_establishment_date', 'business_registration_status_id', 'business_legal_status_id',
        'business_registration_number', 'business_registration_date', 'business_ntn_no',

        'business_activity_id', 'business_category_id', 'business_sector_id', 'business_sub_sector_id',

        'proof_of_ownership_file',
        'registration_certificate_file', 'license_registration_file', 'business_address_type_id', 'business_address_form_id',
        'business_address_1', 'business_address_2', 'business_address_3', 'business_province_id',
        'business_city_id', 'business_district_id', 'business_tehsil_id', 'business_capacity_id', 'business_share',
        'business_acquisition_date', 'business_evidence_ownership_file', 'business_contact_number',
        'business_email', 'utility_connection_question_id', 'employees_question_id', 'turnover_fiscal_year_id',
        'annual_turnover', 'business_account_statement_file',
        'export_question_id', 'export_fiscal_year_id', 'export_currency_id', 'export_annual_turnover',
        'import_question_id', 'import_fiscal_year_id', 'import_currency_id', 'import_annual_turnover',
        'user_id', 'submitted_at', 'status_id'];

    protected $casts = [
        'cnic_issue_date'=>'datetime:d-m-Y',
        'cnic_expiry_date'=>'datetime:d-m-Y',
        'date_of_birth'=>'datetime:d-m-Y',
        'residence_acquisition_date'=>'datetime:d-m-Y',
        'business_establishment_date'=>'datetime:d-m-Y',
        'business_registration_date'=>'datetime:d-m-Y',
        'business_acquisition_date'=>'datetime:d-m-Y',
        'submitted_at'=>'datetime:d-m-Y',
    ];

    public function setAttribute($key, $value)
    {
        switch ($key){
            case 'cnic_issue_date':
            case 'cnic_expiry_date':
            case 'date_of_birth':
            case 'residence_acquisition_date':
            case 'business_establishment_date':
            case 'business_registration_date':
            case 'business_acquisition_date':
                $this->attributes[$key] = Carbon::parse($value)->format('Y-m-d');
            break;
            default:
                $this->attributes[$key] = $value;
            break;
        }
    }

    public function generateTags(): array
    {
        return ['Registration'];
    }

    public function application(): HasOne
    {
       return $this->HasOne(Application::class);
    }

    public function disabilities(): HasMany
    {
        return $this->hasMany(RegistrationDisability::class);
    }

    public function technicalEducations(): HasMany
    {
        return $this->hasMany(RegistrationTechnicalEducation::class);
    }

    public function otherDocuments(): HasMany
    {
        return $this->hasMany(RegistrationOtherDocument::class);
    }

    public function utilityConnections(): HasMany
    {
        return $this->hasMany(RegistrationUtilityConnection::class);
    }

    public function employeeInfos(): HasMany
    {
        return $this->hasMany(RegistrationEmployeeInfo::class);
    }

    public function prefix(): BelongsTo
    {
        return $this->belongsTo(Prefix::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function designationBusiness(): BelongsTo
    {
        return $this->belongsTo(DesignationBusiness::class);
    }

    public function cnicExpiryQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'cnic_expiry_question_id');
    }

    public function activeTaxpayerQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'active_taxpayer_question_id');
    }

    public function disabilityQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'disability_question_id');
    }

    public function minorityStatusQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'minority_status_question_id');
    }

    public function minorityStatus(): BelongsTo
    {
        return $this->belongsTo(MinorityStatus::class);
    }

    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class);
    }
    public function educationLevelQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'technical_education_question_id');
    }

    public function skilledWorkerQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'skilled_worker_question_id');
    }

    public function residenceAddressType(): BelongsTo
    {
        return $this->belongsTo(AddressType::class, 'residence_address_type_id');
    }

    public function residenceAddressForm(): BelongsTo
    {
        return $this->belongsTo(AddressForm::class, 'residence_address_form_id');
    }
    public function residenceProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'residence_province_id');
    }

    public function residenceCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'residence_city_id');
    }

    public function residenceDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'residence_district_id');
    }
    public function residenceTehsil(): BelongsTo
    {
        return $this->belongsTo(Tehsil::class, 'residence_tehsil_id');
    }

    public function residenceAddressCapacity(): BelongsTo
    {
        return $this->belongsTo(AddressCapacity::class, 'residence_capacity_id');
    }


    public function businessRegistrationStatus(): BelongsTo
    {
        return $this->belongsTo(BusinessRegistrationStatus::class);
    }

    public function businessLegalStatus(): BelongsTo
    {
        return $this->belongsTo(BusinessLegalStatus::class);
    }

    public function businessActivity(): BelongsTo
    {
        return $this->belongsTo(BusinessActivity::class);
    }

    public function businessCategory(): BelongsTo
    {
        return $this->belongsTo(BusinessCategory::class);
    }

    public function businessSector(): BelongsTo
    {
        return $this->belongsTo(BusinessSector::class);
    }

    public function businessSubSector(): BelongsTo
    {
        return $this->belongsTo(BusinessSubSector::class);
    }

    public function businessAddressType(): BelongsTo
    {
        return $this->belongsTo(AddressType::class, 'business_address_type_id');
    }

    public function businessAddressForm(): BelongsTo
    {
        return $this->belongsTo(AddressForm::class, 'business_address_form_id');
    }

    public function businessProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'business_province_id');
    }


    public function businessCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'business_city_id');
    }
    public function businessDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'business_district_id');
    }

    public function businessTehsil(): BelongsTo
    {
        return $this->belongsTo(Tehsil::class, 'business_tehsil_id');
    }
    public function businessCapacity(): BelongsTo
    {
        return $this->belongsTo(AddressCapacity::class, 'business_capacity_id');
    }

    public function utilityConnectionQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'utility_connection_question_id');
    }

    public function employeesQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'employees_question_id');
    }

    public function turnoverFiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class,'turnover_fiscal_year_id');
    }

    public function exportQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'export_question_id');
    }

    public function exportFiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class,'export_fiscal_year_id');
    }

    public function exportCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class,'export_currency_id');
    }

    public function importQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class,'import_question_id');
    }
    public function importFiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class,'import_fiscal_year_id');
    }
    public function importCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class,'import_currency_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function statuses(): MorphToMany
    {
        return $this->morphToMany(Status::class, 'statusable')->withTimestamps()->withPivot(['log_remark','log_file']);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $max_number = Registration::max('id')+1;
            $model->registration_no = str_pad($max_number, 7,'0',STR_PAD_LEFT).Carbon::today()->year;
        });
    }
}
