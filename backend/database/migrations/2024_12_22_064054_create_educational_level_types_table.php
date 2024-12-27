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
        Schema::create('educational_level_types', function (Blueprint $table) {
            $table->integer('level_id')->primary();
            $table->enum('level_name', ['universitaria', 'tecnica o tecnologica', 'secundaria incompleta', 'secundaria completa', 'primaria incompleta', 'primaria completa', 'ninguna'])->unique('level_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_level_types');
    }
};
