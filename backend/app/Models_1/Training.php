<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Training
 * 
 * @property int $Training_id
 * @property int|null $people_id
 * @property int|null $educational_levels_id
 * @property string|null $technical_title
 * @property string|null $professional_title
 * @property string|null $postgraduate_degree
 * 
 * @property EducationalLevel|null $educational_level
 * @property Person|null $person
 *
 * @package App\Models
 */
class Training extends Model
{
	protected $table = 'training';
	protected $primaryKey = 'Training_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Training_id' => 'int',
		'people_id' => 'int',
		'educational_levels_id' => 'int'
	];

	protected $fillable = [
		'people_id',
		'educational_levels_id',
		'technical_title',
		'professional_title',
		'postgraduate_degree'
	];

	public function educational_level()
	{
		return $this->belongsTo(EducationalLevel::class, 'educational_levels_id');
	}

	public function person()
	{
		return $this->belongsTo(Person::class, 'people_id');
	}
}
