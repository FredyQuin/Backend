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
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->integer('marital_statuses_id', true);
            $table->integer('people_id')->unique('people_id');
            $table->enum('status_name', ['soltero(@)', 'casado(@)', 'union libre', 'viudo(@)', 'separado(@)']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_statuses');
    }
};
