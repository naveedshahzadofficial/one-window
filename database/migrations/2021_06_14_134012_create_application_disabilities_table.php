<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDisabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_disabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()->constrained();
            $table->foreignId('disability_id')->nullable()->constrained();
            $table->string('disability_other')->nullable();
            $table->string('disability_certificate_file')->nullable();
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
        Schema::dropIfExists('application_disabilities');
    }
}
