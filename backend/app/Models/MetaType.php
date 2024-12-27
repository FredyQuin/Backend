<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MetaType
 * 
 * @property int $meta_id
 * @property int $meta_type_id
 * @property string $meta_description
 * 
 * @property Indicator $indicator
 * @property Od $od
 *
 * @package App\Models
 */
class MetaType extends Model
{
	protected $table = 'meta_type';
	protected $primaryKey = 'meta_id';
	public $timestamps = false;

	protected $casts = [
		'meta_type_id' => 'int'
	];

	protected $fillable = [
		'meta_type_id',
		'meta_description'
	];

	public function indicator()
	{
		return $this->hasOne(Indicator::class, 'meta_id');
	}

	public function od()
	{
		return $this->hasOne(Od::class, 'meta_id');
	}
}
