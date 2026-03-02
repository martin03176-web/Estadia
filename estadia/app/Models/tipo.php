<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo extends Model
{
    protected $fillable = ['tipo'];

    public const PAGINATE = 10;


    //Relación con las incidencias
   
    //Accesor para obtener datos del Area
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->tipo} ";
    }
    
}
