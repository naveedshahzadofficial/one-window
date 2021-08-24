<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordRlcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_rlco', function (Blueprint $table) {
            $table->foreignId('keyword_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('rlco_id')->index()->constrained()->onDelete('cascade');
            $table->primary(['keyword_id', 'rlco_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rlco_keywords');
    }
}
