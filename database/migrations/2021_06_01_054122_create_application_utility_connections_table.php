<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationUtilityConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_utility_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()->constrained();
            $table->foreignId('connection_ownership_id')->nullable()->constrained();
            $table->foreignId('utility_type_id')->nullable()->constrained();
            $table->string('utility_consumer_number')->nullable();
            $table->foreignId('utility_form_id')->nullable()->constrained();
            $table->string('utility_provider_other')->nullable();
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
