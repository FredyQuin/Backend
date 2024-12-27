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
        Schema::table('indicator_result', function (Blueprint $table) {
            $table->foreign(['line_id'], 'fk_indicator_result_to_line')->references(['line_id'])->on('strategic_line')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicator_result', function (Blueprint $table) {
            $table->dropForeign('fk_indicator_result_to_line');
        });
    }
};
