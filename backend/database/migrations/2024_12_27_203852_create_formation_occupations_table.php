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
        Schema::create('formation_occupations', function (Blueprint $table) {
            $table->integer('formation_occupations', true);
            $table->integer('people_id')->unique('people_id');
            $table->enum('nivel_academico', ['Primaria', 'Básica Secundaria', 'Bachiller', 'Técnico', 'Tecnólogo', 'Profesional', 'Especialización', 'Maestría', 'Doctorado', 'Ninguno'])->default('Ninguno');
            $table->enum('ocupacion', ['Empleado público', 'Empleado privado', 'Desempleado/a', 'Contratista del Estado', 'Emprendedor', 'Actividad informal'])->default('Desempleado/a');
            $table->string('nombre_empresa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formation_occupations');
    }
};
