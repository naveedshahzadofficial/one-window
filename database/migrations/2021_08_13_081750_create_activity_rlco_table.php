<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityRlcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_rlco', function (Blueprint $table) {
            $table->foreignId('activity_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('rlco_id')->index()->constrained()->onDelete('cascade');
            $table->primary(['activity_id', 'rlco_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_rlco');
    }
}
