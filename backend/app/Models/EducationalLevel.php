<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalLevel
 * 
 * @property int $educational_levels_id
 * @property int $people_id
 * @property int $level_id
 * 
 * @property EducationalLevelType $educational_level_type
 * @property Person $person
 * @property Collection|Training[] $trainings
 *
 * @package App\Models
 */
class EducationalLevel extends Model
{
	protected $table = 'educational_levels';
	protected $primaryKey = 'educational_levels_id';
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int',
		'level_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'level_id'
	];

	public function educational_level_type()
	{
		return $this->belongsTo(EducationalLevelType::class, 'level_id');
	}

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}

	public function trainings()
	{
		return $this->hasMany(Training::class, 'educational_levels_id');
	}
}
