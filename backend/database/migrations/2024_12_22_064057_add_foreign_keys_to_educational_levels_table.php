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
        Schema::table('educational_levels', function (Blueprint $table) {
            $table->foreign(['level_id'], 'educational_levels_ibfk_1')->references(['level_id'])->on('educational_level_types')->onDelete('CASCADE');
            $table->foreign(['people_id'], 'educational_levels_ibfk_2')->references(['people_id'])->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('educational_levels', function (Blueprint $table) {
            $table->dropForeign('educational_levels_ibfk_1');
            $table->dropForeign('educational_levels_ibfk_2');
        });
    }
};
