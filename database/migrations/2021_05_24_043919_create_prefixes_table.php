<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefixes', function (Blueprint $table) {
            $table->id();
            $table->string('prefix_name');
            $table->unsignedBigInteger('fbr_code_id')->nullable();
            $table->text('prefix_remark')->nullable();
            $table->boolean('prefix_status')->default(1);
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
        Schema::dropIfExists('prefixes');
    }
}
