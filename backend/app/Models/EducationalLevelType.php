<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationalLevelType
 * 
 * @property int $level_id
 * @property string $level_name
 * 
 * @property Collection|EducationalLevel[] $educational_levels
 *
 * @package App\Models
 */
class EducationalLevelType extends Model
{
	protected $table = 'educational_level_types';
	protected $primaryKey = 'level_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'level_id' => 'int'
	];

	protected $fillable = [
		'level_name'
	];

	public function educational_levels()
	{
		return $this->hasMany(EducationalLevel::class, 'level_id');
	}
}
