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
        Schema::create('training', function (Blueprint $table) {
            $table->integer('Training_id')->primary();
            $table->integer('people_id')->nullable();
            $table->integer('educational_levels_id')->nullable()->index('fk_training_to_educational_levels');
            $table->string('technical_title')->nullable();
            $table->string('professional_title')->nullable();
            $table->string('postgraduate_degree')->nullable();

            $table->unique(['people_id', 'educational_levels_id'], 'people_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
};
