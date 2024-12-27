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
        Schema::table('marital_statuses', function (Blueprint $table) {
            $table->foreign(['people_id'], 'marital_statuses_ibfk_1')->references(['people_id'])->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marital_statuses', function (Blueprint $table) {
            $table->dropForeign('marital_statuses_ibfk_1');
        });
    }
};
