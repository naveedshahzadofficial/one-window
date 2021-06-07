<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->foreignId('prefix_id')->nullable()->constrained();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('cnic_no')->unique();
            $table->string('mobile_no')->unique();
            $table->foreignId('telecom_company_id')->nullable()->constrained();
            $table->foreignId('mobile_code_id')->nullable()->constrained();
            $table->boolean('is_admin')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('telecom_company_id');
            $table->dropConstrainedForeignId('mobile_code_id');
            $table->dropColumn(['prefix','first_name','middle_name','last_name','cnic_no','mobile_no']);
            $table->string('name')->after('id');
            $table->dropSoftDeletes();
        });
    }
}
