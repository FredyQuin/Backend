<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeePrivateSector
 * 
 * @property int $private_employment_id
 * @property int|null $people_id
 * @property string|null $company
 * @property string|null $employment_type
 * @property string|null $department
 * @property string|null $position
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class EmployeePrivateSector extends Model
{
	protected $table = 'employee_private_sector';
	protected $primaryKey = 'private_employment_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'private_employment_id' => 'int',
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'company',
		'employment_type',
		'department',
		'position'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
