<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIncidente extends Model
{
    protected $fillable = ['tipo'];

    public const PAGINATE = 10;


    //Relación con las incidencias
    public function atncion(): HasMany
    {
        return $this->hasMany(Incidencia::class);
    }
   
    //Accesor para obtener datos del Area
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->tipo} ";
    }
    
}
