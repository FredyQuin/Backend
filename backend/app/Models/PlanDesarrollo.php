<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlanDesarrollo
 * 
 * @property int $plan_id
 * @property string $plan_name
 * @property string $description
 * 
 * @property StrategicLine $strategic_line
 *
 * @package App\Models
 */
class PlanDesarrollo extends Model
{
	protected $table = 'plan_desarrollo';
	protected $primaryKey = 'plan_id';
	public $timestamps = false;

	protected $fillable = [
		'plan_name',
		'description'
	];

	public function strategic_line()
	{
		return $this->hasOne(StrategicLine::class, 'plan_id');
	}
}
