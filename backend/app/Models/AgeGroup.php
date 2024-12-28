<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AgeGroup
 * 
 * @property int $people_id
 * @property string $age
 *
 * @package App\Models
 */
class AgeGroup extends Model
{
	protected $table = 'age_group';
	protected $primaryKey = 'people_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'age'
	];
}
