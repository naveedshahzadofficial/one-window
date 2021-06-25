<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationUtilityConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_utility_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->nullable()->constrained();
            $table->foreignId('connection_ownership_id')->nullable()->constrained();
            $table->foreignId('utility_type_id')->nullable()->constrained();
            $table->string('utility_consumer_number')->nullable();
            $table->foreignId('utility_form_id')->nullable()->constrained();
            $table->bigInteger('utility_service_provider_id')->nullable()->unsigned();
            $table->foreign('utility_service_provider_id','auc_utility_service_provider_id_foreign')->references('id')->on('utility_service_providers');
            $table->string('utility_provider_other')->nullable();
            $table->string('connection_date')->nullable();
            $table->string('bill_file')->nullable();
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
        Schema::dropIfExists('application_utility_connections');
    }
}
