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
        Schema::table('people_focus', function (Blueprint $table) {
            $table->foreign(['focus_id'], 'people_focus_ibfk_2')->references(['focus_id'])->on('focus_types')->onDelete('CASCADE');
            $table->foreign(['people_id'], 'people_focus_ibfk_1')->references(['people_id'])->on('people')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people_focus', function (Blueprint $table) {
            $table->dropForeign('people_focus_ibfk_2');
            $table->dropForeign('people_focus_ibfk_1');
        });
    }
};
