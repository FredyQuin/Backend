<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DifferentialFocu
 * 
 * @property int $people_id
 * @property string $focus_name
 * @property string $grupo_etnico
 * @property string|null $acreditacion_grupo_etnico
 * @property bool $certificado_discapacidad
 * @property string $tipo_discapacidad
 * @property bool $cuidador_cuidadora
 * @property bool $campesino_campesina
 * @property bool $victima_conflicto
 * @property bool $reincorporacion_reintegracion
 * @property bool $madre_cabeza_familia
 * @property bool $madre_gestante_lactante
 * @property string $sisben
 * 
 * @property Person $person
 *
 * @package App\Models
 */
class DifferentialFocus extends Model
{
	protected $table = 'differential_focus';
	protected $primaryKey = 'people_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int',
		'certificado_discapacidad' => 'bool',
		'cuidador_cuidadora' => 'bool',
		'campesino_campesina' => 'bool',
		'victima_conflicto' => 'bool',
		'reincorporacion_reintegracion' => 'bool',
		'madre_cabeza_familia' => 'bool',
		'madre_gestante_lactante' => 'bool'
	];

	protected $fillable = [
		'people_id',
		'focus_name',
		'grupo_etnico',
		'acreditacion_grupo_etnico',
		'certificado_discapacidad',
		'tipo_discapacidad',
		'cuidador_cuidadora',
		'campesino_campesina',
		'victima_conflicto',
		'reincorporacion_reintegracion',
		'madre_cabeza_familia',
		'madre_gestante_lactante',
		'sisben'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
