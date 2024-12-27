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
        Schema::create('public_sector_employee', function (Blueprint $table) {
            $table->integer('public_employment_id')->primary();
            $table->integer('people_id')->nullable()->index('fk_public_sector_people');
            $table->string('entity')->nullable();
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
        Schema::dropIfExists('public_sector_employee');
    }
};
