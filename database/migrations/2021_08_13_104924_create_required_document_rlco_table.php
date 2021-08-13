<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredDocumentRlcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_document_rlco', function (Blueprint $table) {
            $table->foreignId('required_document_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('rlco_id')->index()->constrained()->onDelete('cascade');
            $table->primary(['required_document_id', 'rlco_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('required_document_rlco');
    }
}
