<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRlcoScopeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rlco_scope', function (Blueprint $table) {
            $table->foreignId('scope_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('rlco_id')->index()->constrained()->onDelete('cascade');
            $table->primary(['scope_id', 'rlco_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scope_rlco');
    }
}
