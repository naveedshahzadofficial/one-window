<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utility_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_name');
            $table->unsignedBigInteger('fbr_code_id')->nullable();
            $table->text('form_remark')->nullable();
            $table->boolean('form_status')->default(1);
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
        Schema::dropIfExists('utility_forms');
    }
}
