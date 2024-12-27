<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Indicator
 * 
 * @property int $indicator_id
 * @property int $meta_id
 * @property string $indicator_name
 * 
 * @property MetaType $meta_type
 *
 * @package App\Models
 */
class Indicator extends Model
{
	protected $table = 'indicator';
	protected $primaryKey = 'indicator_id';
	public $timestamps = false;

	protected $casts = [
		'meta_id' => 'int'
	];

	protected $fillable = [
		'meta_id',
		'indicator_name'
	];

	public function meta_type()
	{
		return $this->belongsTo(MetaType::class, 'meta_id');
	}
}
