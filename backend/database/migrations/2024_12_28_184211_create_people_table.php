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
        Schema::create('people', function (Blueprint $table) {
            $table->integer('people_id')->primary();
            $table->enum('tipo_documento', ['registro civil', 'tarjeta de identidad', 'cedula de ciudadania', 'cedula de extranjeria', 'pasaporte', 'permiso de permanencia temporal']);
            $table->string('nombres_completos')->index('idx_full_name');
            $table->string('correo');
            $table->string('qr_code_path')->nullable();
            $table->string('lugar_expedicion')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
