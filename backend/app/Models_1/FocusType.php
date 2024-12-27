<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FocusType
 * 
 * @property int $focus_id
 * @property string $focus_name
 * 
 * @property Collection|PeopleFocu[] $people_focus
 *
 * @package App\Models
 */
class FocusType extends Model
{
	protected $table = 'focus_types';
	protected $primaryKey = 'focus_id';
	public $timestamps = false;

	protected $fillable = [
		'focus_name'
	];

	public function people_focus()
	{
		return $this->hasMany(PeopleFocu::class, 'focus_id');
	}
}
