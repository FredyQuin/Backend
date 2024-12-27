<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = 'emergency'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'emergency_id'; // Llave primaria
    public $incrementing = false; // Si no es auto-incremental
    public $timestamps = false; // Si no utilizas timestamps

    protected $fillable = [
        'people_id',
        'blood_type',
        'contact_name',
        'contact_phone',
        'contact_relationship',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
}
