<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_private_sector', function (Blueprint $table) {
            $table->integer('private_employment_id')->primary();
            $table->integer('people_id')->nullable()->index('fk_private_sector_people');
            $table->string('company')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_private_sector');
    }
};
