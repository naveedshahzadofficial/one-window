<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statusables', function (Blueprint $table) {
            $table->foreignId('status_id')->nullable()->constrained();
            $table->unsignedBigInteger('statusable_id');
            $table->string("statusable_type");
            $table->unsignedBigInteger('user_id');
            $table->string("user_type");
            $table->string('log_file')->nullable();
            $table->text('log_remark')->nullable();
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
        Schema::dropIfExists('statusables');
    }
}
