<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Population
 * 
 * @property int $Population_id
 * @property int|null $people_id
 * @property string|null $ethnic_group
 * @property string|null $ethnic_accreditation
 * @property string|null $disability
 * @property bool|null $disability_certificate
 * @property bool|null $caregiver
 * @property bool|null $peasant
 * @property bool|null $conflict_victim
 * @property bool|null $reincorporation_reintegration
 * @property string|null $lgtbiqa
 * @property bool|null $migrant
 * @property bool|null $srpa
 * @property bool|null $freedom_deprivation
 * @property bool|null $mother_head_family
 * @property bool|null $pregnant_mother
 * @property Carbon|null $gestation_date
 * @property string|null $sisben
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class Population extends Model
{
	protected $table = 'population';
	protected $primaryKey = 'Population_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Population_id' => 'int',
		'people_id' => 'int',
		'disability_certificate' => 'bool',
		'caregiver' => 'bool',
		'peasant' => 'bool',
		'conflict_victim' => 'bool',
		'reincorporation_reintegration' => 'bool',
		'migrant' => 'bool',
		'srpa' => 'bool',
		'freedom_deprivation' => 'bool',
		'mother_head_family' => 'bool',
		'pregnant_mother' => 'bool',
		'gestation_date' => 'datetime'
	];

	protected $fillable = [
		'people_id',
		'ethnic_group',
		'ethnic_accreditation',
		'disability',
		'disability_certificate',
		'caregiver',
		'peasant',
		'conflict_victim',
		'reincorporation_reintegration',
		'lgtbiqa',
		'migrant',
		'srpa',
		'freedom_deprivation',
		'mother_head_family',
		'pregnant_mother',
		'gestation_date',
		'sisben'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
