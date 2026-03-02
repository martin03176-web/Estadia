<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EquipoFumigacion extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public const PAGINATE = 10;


    //Relación con las incidencias
     public function atncion(): HasMany
     {
         return $this->hasMany(Fumigacion::class);
     }
    
}
