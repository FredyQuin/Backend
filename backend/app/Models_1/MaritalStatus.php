<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaritalStatus
 * 
 * @property int $marital_statuses_id
 * @property int $people_id
 * @property string $status_name
 * 
 * @property Person $person
 *
 * @package App\Models
 */
class MaritalStatus extends Model
{
	protected $table = 'marital_statuses';
	protected $primaryKey = 'marital_statuses_id';
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'status_name'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
