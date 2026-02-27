<?php

namespace App\Models;

use App\Models\Incidente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Responsable extends Model
{
    protected $fillable = ['nombre','telefono','puesto_area','nota'];

    public const PAGINATE = 10;


    //Relación con las atenciones
    public function atncion(): HasMany
    {
        return $this->hasMany(Incidente::class);
    }

    //Accesor para obtener datos del paciente
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->telefono} {$this->puesto_area} {$this->nota}";
    }
    
}
