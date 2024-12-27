<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emergency
 * 
 * @property int|null $people_id
 * @property string|null $blood_type
 * @property string|null $contact_name
 * @property string|null $contact_phone
 * @property string|null $contact_relationship
 * 
 * @property Person|null $person
 *
 * @package App\Models
 */
class Emergency extends Model
{
	protected $table = 'emergency';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'people_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'blood_type',
		'contact_name',
		'contact_phone',
		'contact_relationship'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
