<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sector
 * 
 * @property int $sector_id
 * @property int $plan_id
 * @property string $sector_name
 * 
 * @property Program $program
 *
 * @package App\Models
 */
class Sector extends Model
{
	protected $table = 'sector';
	protected $primaryKey = 'sector_id';
	public $timestamps = false;

	protected $casts = [
		'plan_id' => 'int'
	];

	protected $fillable = [
		'plan_id',
		'sector_name'
	];

	public function program()
	{
		return $this->hasOne(Program::class);
	}
}
