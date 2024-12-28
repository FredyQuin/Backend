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
        Schema::create('age_group', function (Blueprint $table) {
            $table->integer('people_id')->unique('people_id');
            $table->enum('age', ['niño/niña_(menor_a_12_años)', 'adolecente_(13-17_años)', 'joven_(18-28_años)', 'adulto_(28-59_años)', 'adulto_mayor_(mayo_60_años)']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_group');
    }
};
