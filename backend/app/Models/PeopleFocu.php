<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeopleFocu
 * 
 * @property int $people_id
 * @property int $focus_id
 * 
 * @property Person $person
 * @property FocusType $focus_type
 *
 * @package App\Models
 */
class PeopleFocu extends Model
{
	protected $table = 'people_focus';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int',
		'focus_id' => 'int'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}

	public function focus_type()
	{
		return $this->belongsTo(FocusType::class, 'focus_id');
	}
}
