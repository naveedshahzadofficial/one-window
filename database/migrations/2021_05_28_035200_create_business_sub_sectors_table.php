<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessSubSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_sub_sectors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_sector_id')->constrained();
            $table->string('sub_sector_name_e');
            $table->string('sub_sector_name_u');
            $table->text('sub_sector_remark')->nullable();
            $table->boolean('sub_sector_status')->default(1);
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
        Schema::dropIfExists('business_sub_sectors');
    }
}
