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
        Schema::table('training', function (Blueprint $table) {
            $table->foreign(['educational_levels_id'], 'fk_training_to_educational_levels')->references(['educational_levels_id'])->on('educational_levels')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['people_id'], 'training_ibfk_1')->references(['people_id'])->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training', function (Blueprint $table) {
            $table->dropForeign('fk_training_to_educational_levels');
            $table->dropForeign('training_ibfk_1');
        });
    }
};
