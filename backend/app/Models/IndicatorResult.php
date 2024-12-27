<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IndicatorResult
 * 
 * @property int $indicator_id
 * @property int $line_id
 * @property string $indicator_name
 * 
 * @property StrategicLine $strategic_line
 *
 * @package App\Models
 */
class IndicatorResult extends Model
{
	protected $table = 'indicator_result';
	protected $primaryKey = 'indicator_id';
	public $timestamps = false;

	protected $casts = [
		'line_id' => 'int'
	];

	protected $fillable = [
		'line_id',
		'indicator_name'
	];

	public function strategic_line()
	{
		return $this->belongsTo(StrategicLine::class, 'line_id');
	}
}
