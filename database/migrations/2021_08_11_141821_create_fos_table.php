<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rlco_id')->nullable();
            $table->text('fos_observation');
            $table->text('fos_solution');
            $table->unsignedInteger('fos_order')->nullable();
            $table->boolean('fos_status')->default(1);
            $table->foreignId('admin_id')->nullable();
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
        Schema::dropIfExists('fos');
    }
}
