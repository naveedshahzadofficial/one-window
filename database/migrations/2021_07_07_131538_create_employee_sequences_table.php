<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_sequences', function (Blueprint $table) {
            $table->id();
            $table->string('sequence_name');
            $table->string('sequence_type')->nullable()->default('All');
            $table->text('sequence_remark')->nullable();
            $table->boolean('sequence_status')->nullable()->default(1);
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
        Schema::dropIfExists('employee_sequences');
    }
}
