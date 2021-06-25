<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->nullable()->constrained();
            $table->unsignedTinyInteger('is_applied')->nullable()->default(0);
            $table->text('certification_remark')->nullable();
            $table->boolean('certification_status')->default(1);
            $table->foreignId('status_id')->nullable()->default(5)->constrained();
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
        Schema::dropIfExists('application_certifications');
    }
}
