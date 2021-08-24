<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRlcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rlcos', function (Blueprint $table) {
            $table->id();
            $table->string('rlco_no')->nullable();
            $table->string('rlco_name')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('department_id')->nullable()->constrained();
            $table->foreignId('business_category_id')->nullable()->constrained();
            $table->foreignId('business_activity_id')->nullable()->constrained();
            $table->string('scope')->nullable();
            $table->string('title_of_law')->nullable();
            $table->string('link_of_law')->nullable();
            $table->string('automation_status')->nullable();
            $table->string('fee')->nullable();
            $table->string('renewal_required')->nullable();
            $table->string('renewal_fee')->nullable();
            $table->string('fee_submission_mode')->nullable();
            $table->string('payment_source')->nullable();
            $table->string('challan_form_file')->nullable();
            $table->string('validity')->nullable();
            $table->string('time_taken')->nullable();
            $table->string('keywords')->nullable();
            $table->string('process_flow_diagram_file')->nullable();
            $table->string('automated_system_link')->nullable();
            $table->string('application_form_file')->nullable();
            $table->string('inspection_required')->nullable();
            $table->text('fine_details')->nullable();
            $table->string('relevant_laws_file')->nullable();
            $table->string('mode_of_inspection')->nullable();
            $table->foreignId('inspection_department_id')->nullable()->constrained('departments');
            $table->longText('manual_detail')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained();
            $table->boolean('rlco_status')->default(1);
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
        Schema::dropIfExists('rlcos');
    }
}
