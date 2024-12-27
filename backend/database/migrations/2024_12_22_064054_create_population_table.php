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
        Schema::create('population', function (Blueprint $table) {
            $table->integer('Population_id')->primary();
            $table->integer('people_id')->nullable()->index('fk_population_people');
            $table->string('ethnic_group')->nullable();
            $table->string('ethnic_accreditation')->nullable();
            $table->string('disability')->nullable();
            $table->boolean('disability_certificate')->nullable();
            $table->boolean('caregiver')->nullable();
            $table->boolean('peasant')->nullable();
            $table->boolean('conflict_victim')->nullable();
            $table->boolean('reincorporation_reintegration')->nullable();
            $table->string('lgtbiqa')->nullable();
            $table->boolean('migrant')->nullable();
            $table->boolean('srpa')->nullable();
            $table->boolean('freedom_deprivation')->nullable();
            $table->boolean('mother_head_family')->nullable();
            $table->boolean('pregnant_mother')->nullable();
            $table->date('gestation_date')->nullable();
            $table->char('sisben', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('population');
    }
};
