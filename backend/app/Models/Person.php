<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * 
 * @property int $people_id
 * @property string $tipo_documento
 * @property string $nombres_completos
 * @property string $correo
 * @property string|null $qr_code_path
 * @property string|null $lugar_expedicion
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property Carbon|null $fecha_nacimiento
 * @property string|null $nacionalidad
 * 
 * @property Activity $activity
 * @property AgeGroup $age_group
 * @property Contact $contact
 * @property Contractor $contractor
 * @property DifferentialFocu $differential_focu
 * @property EducationalLevel $educational_level
 * @property Emergency $emergency
 * @property EmployeePrivateSector $employee_private_sector
 * @property Collection|Entrepreneur[] $entrepreneurs
 * @property FormationOccupation $formation_occupation
 * @property MaritalStatus $marital_status
 * @property Collection|PeopleFocu[] $people_focus
 * @property Population $population
 * @property PublicSectorEmployee $public_sector_employee
 * @property Sex $sex
 * @property Collection|Training[] $trainings
 *
 * @package App\Models
 */
class Person extends Model
{
	protected $table = 'people';
	protected $primaryKey = 'people_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int',
		'fecha_nacimiento' => 'datetime'
	];

	protected $fillable = [
		'people_id',
		'tipo_documento',
		'nombres_completos',
		'correo',
		'qr_code_path',
		'lugar_expedicion',
		'primer_apellido',
		'segundo_apellido',
		'fecha_nacimiento',
		'nacionalidad'
	];

	public function activity()
	{
		return $this->hasOne(Activity::class, 'people_id');
	}

	public function age_group()
	{
		return $this->hasOne(AgeGroup::class, 'people_id');
	}

	public function contact()
	{
		return $this->hasOne(Contact::class, 'people_id');
	}

	public function contractor()
	{
		return $this->hasOne(Contractor::class, 'people_id');
	}

	public function differential_focu()
	{
		return $this->hasOne(DifferentialFocu::class, 'people_id');
	}

	public function educational_level()
	{
		return $this->hasOne(EducationalLevel::class, 'people_id');
	}

	public function emergency()
	{
		return $this->hasOne(Emergency::class, 'people_id');
	}

	public function employee_private_sector()
	{
		return $this->hasOne(EmployeePrivateSector::class, 'people_id');
	}

	public function entrepreneurs()
	{
		return $this->hasMany(Entrepreneur::class, 'people_id');
	}

	public function formation_occupation()
	{
		return $this->hasOne(FormationOccupation::class, 'people_id');
	}

	public function marital_status()
	{
		return $this->hasOne(MaritalStatus::class, 'people_id');
	}

	public function people_focus()
	{
		return $this->hasMany(PeopleFocu::class, 'people_id');
	}

	public function population()
	{
		return $this->hasOne(Population::class, 'people_id');
	}

	public function public_sector_employee()
	{
		return $this->hasOne(PublicSectorEmployee::class, 'people_id');
	}

	public function sex()
	{
		return $this->hasOne(Sex::class, 'people_id');
	}

	public function trainings()
	{
		return $this->hasMany(Training::class, 'people_id');
	}
}
