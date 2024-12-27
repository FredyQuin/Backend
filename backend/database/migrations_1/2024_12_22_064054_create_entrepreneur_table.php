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
        Schema::create('entrepreneur', function (Blueprint $table) {
            $table->integer('entrepreneurship_id')->primary();
            $table->integer('people_id')->nullable()->index('fk_entrepreneur_people');
            $table->string('entrepreneurship_name')->nullable();
            $table->date('start_date')->nullable();
            $table->string('role')->nullable();
            $table->string('activity_type')->nullable();
            $table->boolean('institutional_offer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrepreneur');
    }
};
