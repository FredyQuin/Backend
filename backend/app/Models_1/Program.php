<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Program
 * 
 * @property int $program_id
 * @property int $sector_id
 * @property string $program_name
 * 
 * @property Sector $sector
 *
 * @package App\Models
 */
class Program extends Model
{
	protected $table = 'program';
	protected $primaryKey = 'program_id';
	public $timestamps = false;

	protected $casts = [
		'sector_id' => 'int'
	];

	protected $fillable = [
		'sector_id',
		'program_name'
	];

	public function sector()
	{
		return $this->belongsTo(Sector::class);
	}
}
