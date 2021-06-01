<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['prefix', 'first_name', 'middle_name', 'last_name', 'gender', 'cnic_no',
        'cnic_issue_date', 'cnic_expiry_date', 'date_of_birth', 'designation_business_id', 'minority_status_question_id',
        'minority_status_id', 'minority_status_other', 'ntn_personal', 'education_level_id', 'technical_education_question_id',
        'certificate_title', 'skilled_worker_question_id', 'skill_or_art', 'residence_address_type_id',
        'residence_address_form_id', 'residence_address_1', 'residence_address_2', 'residence_address_3',
        'residence_city_id', 'residence_district_id', 'residence_capacity_id', 'residence_share_id', 'residence_acquisition_date',
        'personal_mobile_no', 'personal_email',
        'business_name', 'business_establishment_date', 'business_registration_status_id', 'business_legal_status_id',
        'business_registration_number', 'business_registration_date', 'business_ntn_no',
        'business_category_id', 'business_sector_id', 'business_sub_sector_id', 'proof_of_ownership_file',
        'registration_certificate_file', 'license_registration_file', 'business_address_type_id', 'business_address_form_id',
        'business_address_1', 'business_address_2', 'business_address_3', 'business_province_id',
        'business_city_id', 'business_district_id', 'business_tehsil_id', 'business_capacity_id', 'business_share_id',
        'business_acquisition_date', 'business_evidence_ownership_file', 'business_contact_number',
        'business_email', 'utility_connection_question_id', 'employees_question_id', 'turnover_fiscal_year_id',
        'annual_turnover', 'business_account_statement_file', 'export_fiscal_year_id', 'export_currency_id', 'export_annual_turnover'];

    /*protected $casts = [
        'cnic_issue_date'=>'datetime:Y-m-d'
    ];*/

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
}
