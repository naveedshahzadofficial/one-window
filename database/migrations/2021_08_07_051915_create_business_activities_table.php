<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_activities', function (Blueprint $table) {
            $table->id();
            $table->string('section_code')->nullable();
            $table->string('section_name')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->string('division_name')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('group_name')->nullable();
            $table->string('class_code')->nullable();
            $table->string('class_name')->nullable();
            $table->string('sub_class_code')->nullable();
            $table->string('sub_class_name')->nullable();
            $table->text('activity_remark')->nullable();
            $table->boolean('activity_status')->default(1);
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
        Schema::dropIfExists('business_activities');
    }
}
