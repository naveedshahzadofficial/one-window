<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefix_id')->nullable()->constrained();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->foreignId('gender_id')->nullable()->constrained();
            $table->string('cnic_no');
            $table->date('cnic_issue_date');
            $table->date('cnic_expiry_date');
            $table->date('date_of_birth');
            $table->foreignId('cnic_expiry_question_id')->nullable()->constrained('questions');
            $table->foreignId('designation_business_id')->nullable()->constrained();
            $table->foreignId('minority_status_question_id')->nullable()->constrained('questions');
            $table->foreignId('minority_status_id')->nullable()->constrained();
            $table->string('minority_status_other')->nullable();
            $table->foreignId('active_taxpayer_question_id')->nullable()->constrained('questions');
            $table->foreignId('disability_question_id')->nullable()->constrained('questions');
            $table->string('ntn_personal')->nullable();
            $table->foreignId('education_level_id')->nullable()->constrained();
            $table->foreignId('technical_education_question_id')->nullable()->constrained('questions');
            $table->string('certificate_title')->nullable();
            $table->foreignId('skilled_worker_question_id')->nullable()->constrained('questions');
            $table->string('skill_or_art')->nullable();
            $table->foreignId('residence_address_type_id')->nullable()->constrained('address_types');
            $table->foreignId('residence_address_form_id')->nullable()->constrained('address_forms');
            $table->text('residence_address_1')->nullable();
            $table->text('residence_address_2')->nullable();
            $table->text('residence_address_3')->nullable();

            $table->foreignId('residence_province_id')->nullable()->constrained('provinces');
            $table->foreignId('residence_city_id')->nullable()->constrained('cities');
            $table->foreignId('residence_district_id')->nullable()->constrained('districts');
            $table->foreignId('residence_tehsil_id')->nullable()->constrained('tehsils');

            $table->foreignId('residence_capacity_id')->nullable()->constrained('address_capacities');
            $table->string('residence_share')->nullable();
            $table->date('residence_acquisition_date')->nullable();
            $table->string('personal_mobile_no')->nullable();
            $table->string('personal_email')->nullable();
            /*Business Tab*/
            $table->string('business_name')->nullable();
            $table->date('business_establishment_date')->nullable();
            $table->foreignId('business_registration_status_id')->nullable()->constrained();
            $table->foreignId('business_legal_status_id')->nullable()->constrained();
            $table->string('business_registration_number')->nullable();
            $table->date('business_registration_date')->nullable();
            $table->string('business_ntn_no')->nullable();
            $table->foreignId('business_activity_id')->nullable()->constrained();

            $table->foreignId('business_category_id')->nullable()->constrained();
            $table->foreignId('business_sector_id')->nullable()->constrained();
            $table->foreignId('business_sub_sector_id')->nullable()->constrained();

            $table->string('proof_of_ownership_file')->nullable();
            $table->string('registration_certificate_file')->nullable();
            $table->string('license_registration_file')->nullable();

            $table->foreignId('business_address_type_id')->nullable()->constrained('address_types');
            $table->foreignId('business_address_form_id')->nullable()->constrained('address_forms');
            $table->text('business_address_1')->nullable();
            $table->text('business_address_2')->nullable();
            $table->text('business_address_3')->nullable();
            $table->foreignId('business_province_id')->nullable()->constrained('provinces');
            $table->foreignId('business_city_id')->nullable()->constrained('cities');
            $table->foreignId('business_district_id')->nullable()->constrained('districts');
            $table->foreignId('business_tehsil_id')->nullable()->constrained('tehsils');
            $table->foreignId('business_capacity_id')->nullable()->constrained('address_capacities');
            $table->string("business_share")->nullable();
            $table->date('business_acquisition_date')->nullable();
            $table->string('business_evidence_ownership_file')->nullable();
            $table->string('business_contact_number')->nullable();
            $table->string('business_email')->nullable();
            $table->foreignId('utility_connection_question_id')->nullable()->constrained('questions');
            $table->foreignId('employees_question_id')->nullable()->constrained('questions');
            $table->foreignId('turnover_fiscal_year_id')->nullable()->constrained('fiscal_years');
            $table->decimal('annual_turnover',20,2)->nullable();
            $table->string('business_account_statement_file')->nullable();

            $table->foreignId('export_question_id')->nullable()->constrained('questions');
            $table->foreignId('export_fiscal_year_id')->nullable()->constrained('fiscal_years');
            $table->foreignId('export_currency_id')->nullable()->constrained('currencies');
            $table->decimal('export_annual_turnover',20,2)->nullable();

            $table->foreignId('import_question_id')->nullable()->constrained('questions');
            $table->foreignId('import_fiscal_year_id')->nullable()->constrained('fiscal_years');
            $table->foreignId('import_currency_id')->nullable()->constrained('currencies');
            $table->decimal('import_annual_turnover',20,2)->nullable();

            $table->foreignId('user_id')->nullable()->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
