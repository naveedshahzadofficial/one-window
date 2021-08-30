<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessActivityRlcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_activity_rlco', function (Blueprint $table) {
            $table->foreignId('business_activity_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('rlco_id')->index()->constrained()->onDelete('cascade');
            $table->primary(['business_activity_id', 'rlco_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_activity_rlco');
    }
}
