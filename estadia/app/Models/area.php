<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $fillable = [
        'tipo_establecimiento',
        'nivel',
        'lugar_especifico',
        'nota'
    ];

    public const PAGINATE = 10;


    //Relación con las incidencias
     public function incidente(): HasMany
     {
         return $this->hasMany(Incidente::class);
     }
    
}
