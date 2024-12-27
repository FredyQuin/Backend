<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrepreneur
 * 
 * @property int $entrepreneurship_id
 * @property int|null $people_id
 * @property string|null $entrepreneurship_name
 * @property Carbon|null $start_date
 * @property string|null $role
 * @property string|null $activity_type
 * @property bool|null $institutional_offer
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class Entrepreneur extends Model
{
	protected $table = 'entrepreneur';
	protected $primaryKey = 'entrepreneurship_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entrepreneurship_id' => 'int',
		'people_id' => 'int',
		'start_date' => 'datetime',
		'institutional_offer' => 'bool'
	];

	protected $fillable = [
		'people_id',
		'entrepreneurship_name',
		'start_date',
		'role',
		'activity_type',
		'institutional_offer'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
