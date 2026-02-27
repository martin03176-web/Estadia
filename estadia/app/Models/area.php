<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $fillable = ['edificio','piso','lugar','nota'];

    public const PAGINATE = 10;


    //Relación con las incidencias
     public function atncion(): HasMany
     {
         return $this->hasMany(Incidente::class);
     }
   
    //Accesor para obtener datos del Area
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->edificio} {$this->piso} {$this->lugar} {$this->nota}";
    }
    
}
