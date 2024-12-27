<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contractor
 * 
 * @property int|null $people_id
 * @property string|null $entity
 * @property string|null $contract_type
 * @property string|null $department
 * @property string|null $main_activity
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class Contractor extends Model
{
	protected $table = 'contractor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'entity',
		'contract_type',
		'department',
		'main_activity'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
