<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationEmployeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_employee_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->nullable()->constrained();
            $table->foreignId('employee_type_id')->nullable()->constrained();
            $table->string('male')->nullable()->default(0);
            $table->string('female')->nullable()->default(0);
            $table->string('transgender')->nullable()->default(0);
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
        Schema::dropIfExists('application_employee_infos');
    }
}
