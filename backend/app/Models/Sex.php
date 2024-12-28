<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sex
 * 
 * @property int $people_id
 * @property string $sexo
 *
 * @package App\Models
 */
class Sex extends Model
{
	protected $table = 'sex';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'sexo'
	];
}
