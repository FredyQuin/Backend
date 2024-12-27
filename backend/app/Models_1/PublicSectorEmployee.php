<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicSectorEmployee
 * 
 * @property int $public_employment_id
 * @property int|null $people_id
 * @property string|null $entity
 * @property string|null $employment_type
 * @property string|null $department
 * @property string|null $position
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class PublicSectorEmployee extends Model
{
	protected $table = 'public_sector_employee';
	protected $primaryKey = 'public_employment_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'public_employment_id' => 'int',
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'entity',
		'employment_type',
		'department',
		'position'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
