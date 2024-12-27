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
        Schema::create('differential_focus_id', function (Blueprint $table) {
            $table->integer('differential_focus_id', true);
            $table->integer('people_id')->unique('people_id');
            $table->enum('focus_name', ['reintegrado', 'desmovilizado', 'extrema pobreza', 'poblacion victima del conflicto armado', 'poblacion LGBTIQ', 'personas en condicion de discapacidad', 'mujeres cabeza de familia', 'adultos mayores', 'ninos ninas y adolecentes']);
            $table->enum('grupo_etnico', ['Negro', 'Afrocolombiano', 'praizal o palanquero (NARP)', 'Otro', 'Ninguno'])->default('Ninguno');   
            $table->string('acreditacion_grupo_etnico')->nullable();
            $table->boolean('certificado_discapacidad')->default(false);
            $table->enum('tipo_discapacidad', ['Física', 'Auditiva', 'Visual', 'Intelectual', 'Psicológica', 'Ninguna'])->default('Ninguna');
            $table->boolean('cuidador_cuidadora')->default(false);
            $table->boolean('campesino_campesina')->default(false);
            $table->boolean('victima_conflicto')->default(false);
            $table->boolean('reincorporacion_reintegracion')->default(false);
            $table->boolean('madre_cabeza_familia')->default(false);
            $table->boolean('madre_gestante_lactante')->default(false);
            $table->enum('sisben', ['A', 'B', 'C', 'D', 'Ninguno'])->default('Ninguno');
        });
    }
    public $timestamps = false;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('differential_focus_id');
    }
};

