<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelRiesgo extends Model
{
    protected $fillable = ['nivel'];

    public const PAGINATE = 10;


    //Relación con las incidencias
    public function atncion(): HasMany
    {
        return $this->hasMany(Incidencia::class);
    }
   
    //Accesor para obtener datos del Area
    public function getNivelCompletoAttribute(): string
    {
        return "{$this->nivel} ";
    }

}
