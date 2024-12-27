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
        Schema::table('emergency', function (Blueprint $table) {
            $table->foreign(['people_id'], 'fk_emergency_to_people')->references(['people_id'])->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emergency', function (Blueprint $table) {
            $table->dropForeign('fk_emergency_to_people');
        });
    }
};
