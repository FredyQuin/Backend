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
        Schema::table('strategic_line', function (Blueprint $table) {
            $table->foreign(['plan_id'], 'fk_strategic_line_to_plan')->references(['plan_id'])->on('plan_desarrollo')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('strategic_line', function (Blueprint $table) {
            $table->dropForeign('fk_strategic_line_to_plan');
        });
    }
};
