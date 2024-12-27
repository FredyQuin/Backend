<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Od
 * 
 * @property int $ods_id
 * @property int $meta_id
 * @property string $ods_description
 * 
 * @property MetaType $meta_type
 *
 * @package App\Models
 */
class Od extends Model
{
	protected $table = 'ods';
	protected $primaryKey = 'ods_id';
	public $timestamps = false;

	protected $casts = [
		'meta_id' => 'int'
	];

	protected $fillable = [
		'meta_id',
		'ods_description'
	];

	public function meta_type()
	{
		return $this->belongsTo(MetaType::class, 'meta_id');
	}
}
