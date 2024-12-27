<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StrategicLine
 * 
 * @property int $line_id
 * @property int $plan_id
 * @property string $line_name
 * 
 * @property PlanDesarrollo $plan_desarrollo
 * @property IndicatorResult $indicator_result
 *
 * @package App\Models
 */
class StrategicLine extends Model
{
	protected $table = 'strategic_line';
	protected $primaryKey = 'line_id';
	public $timestamps = false;

	protected $casts = [
		'plan_id' => 'int'
	];

	protected $fillable = [
		'plan_id',
		'line_name'
	];

	public function plan_desarrollo()
	{
		return $this->belongsTo(PlanDesarrollo::class, 'plan_id');
	}

	public function indicator_result()
	{
		return $this->hasOne(IndicatorResult::class, 'line_id');
	}
}
