<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utility_service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utility_form_id')->nullable()->constrained();
            $table->string('provider_name');
            $table->unsignedBigInteger('fbr_code_id')->nullable();
            $table->text('provider_remark')->nullable();
            $table->boolean('provider_status')->default(1);
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
        Schema::dropIfExists('utility_service_providers');
    }
}
