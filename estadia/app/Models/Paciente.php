<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    protected $fillable = ['nombre','edad','sexo','telefono','codigo','carrera_area','semestre'];

    public const PAGINATE = 10;


    //Relación con las atenciones
    public function atncion(): HasMany
    {
        return $this->hasMany(Atencion::class);
    }

    //Accesor para obtener datos del paciente
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->edad} {$this->codigo} {$this->carrera_area} {$this->semestre}";
    }
    
}
