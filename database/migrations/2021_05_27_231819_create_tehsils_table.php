<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTehsilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tehsils', function (Blueprint $table) {
            $table->id();
            $table->string('tehsil_name_e');
            $table->string('tehsil_name_u');
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('province_id')->nullable();
            $table->tinyInteger('tehsil_is_thq')->nullable()->default(0);
            $table->text('tehsil_remark')->nullable();
            $table->boolean('tehsil_status')->default(1);
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
