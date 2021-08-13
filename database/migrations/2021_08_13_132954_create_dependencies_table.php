<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rlco_id')->nullable()->constrained();
            $table->foreignId('department_id')->nullable()->constrained();
            $table->string('activity_name')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('dependency_status')->default(1);
            $table->foreignId('admin_id')->nullable()->constrained();
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
        Schema::dropIfExists('dependencies');
    }
}
