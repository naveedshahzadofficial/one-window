<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('district_name_e');
            $table->string('district_name_u');
            $table->unsignedInteger('division_id')->nullable();
            $table->unsignedInteger('province_id')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->text('district_remark')->nullable();
            $table->tinyInteger('district_is_business')->default(0);
            $table->boolean('district_status')->default(1);
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
        Schema::dropIfExists('address_forms');
    }
}
