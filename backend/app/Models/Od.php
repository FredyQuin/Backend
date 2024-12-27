<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Od
 * 
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
	protected $primaryKey = 'meta_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'meta_id' => 'int'
	];

	protected $fillable = [
		'ods_description'
	];

	public function meta_type()
	{
		return $this->belongsTo(MetaType::class, 'meta_id');
	}
}
