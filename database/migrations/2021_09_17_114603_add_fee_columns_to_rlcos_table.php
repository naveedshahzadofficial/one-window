<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeeColumnsToRlcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlcos', function (Blueprint $table) {
            $table->string('fee_question')->nullable();
            $table->string('fee_plan')->nullable();
            $table->string('renewal_fee_plan')->nullable();
            $table->longText('renewal_fee_schedule')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rlcos', function (Blueprint $table) {
            $table->dropColumn('fee_question');
            $table->dropColumn('fee_plan');
            $table->dropColumn('renewal_fee_plan');
            $table->dropColumn('renewal_fee_schedule');
        });
    }
}
