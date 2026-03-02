<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clave extends Model
{
    protected $fillable = ['clave'];

    public const PAGINATE = 10;


    //Relación con las incidencias
   
    //Accesor para obtener datos del Area
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->clave} ";
    }
    
}
