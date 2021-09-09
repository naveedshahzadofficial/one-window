<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppurlDeptwebPurposeToRlcos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlcos', function (Blueprint $table) {
            $table->text('purpose')->nullable();
            $table->string('application_url')->nullable();
            $table->string('department_website')->nullable();
            $table->longText('fee_schedule')->nullable();
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
            $table->dropColumn('purpose');
            $table->dropColumn('application_url');
            $table->dropColumn('department_website');
            $table->dropColumn('fee_schedule');
        });
    }
}
