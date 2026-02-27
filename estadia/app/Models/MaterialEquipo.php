<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialEquipo extends Model
{
    protected $fillable = ['nombre','nota'];

    public const PAGINATE = 10;


    //Relación con las atenciones
    public function atncion(): HasMany
    {
        return $this->hasMany(Incidente::class);
    }

    //Accesor para obtener datos del paciente
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->nota}";
    }
    
}
