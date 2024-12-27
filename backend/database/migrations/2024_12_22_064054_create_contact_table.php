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
        Schema::create('contact', function (Blueprint $table) {
            $table->integer('contact_id')->primary();
            $table->integer('people_id')->nullable()->index('fk_contact_people');
            $table->string('telefono_principal', 15)->default('Sin especificar');
            $table->string('telefono_secundario', 15)->default('Sin especificar');
            $table->string('correo_electronico')->default('correo@ejemplo.com');
            $table->string('direccion_residencia')->default('No especificada');
            $table->string('municipio', 100)->default('No especificado');
            $table->string('barrio_vereda', 100)->default('No especificado');
            $table->string('comuna_corregimiento', 100)->default('No especificado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
};
