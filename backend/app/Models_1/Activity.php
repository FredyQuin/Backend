<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * 
 * @property int $id
 * @property int $people_id
 * @property string $activity_details
 * @property Carbon $created_at
 * 
 * @property Person $person
 *
 * @package App\Models
 */
class Activity extends Model
{
	protected $table = 'activities';
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'activity_details'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
