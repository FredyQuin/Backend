<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * 
 * @property int $contact_id
 * @property int|null $people_id
 * @property string $telefono_principal
 * @property string $telefono_secundario
 * @property string $correo_electronico
 * @property string $direccion_residencia
 * @property string $municipio
 * @property string $barrio_vereda
 * @property string $comuna_corregimiento
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contact';
	public $timestamps = false;

	protected $casts = [
		'contact_id' => 'int',
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'telefono_principal',
		'telefono_secundario',
		'correo_electronico',
		'direccion_residencia',
		'municipio',
		'barrio_vereda',
		'comuna_corregimiento'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
