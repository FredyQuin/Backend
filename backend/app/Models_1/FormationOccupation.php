<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FormationOccupation
 * 
 * @property int $formation_occupations
 * @property int $people_id
 * @property string $nivel_academico
 * @property string $ocupacion
 * @property string|null $nombre_empresa
 * 
 * @property Person $person
 *
 * @package App\Models
 */
class FormationOccupation extends Model
{
	protected $table = 'formation_occupations';
	protected $primaryKey = 'formation_occupations';
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'nivel_academico',
		'ocupacion',
		'nombre_empresa'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
