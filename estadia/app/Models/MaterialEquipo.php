<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MaterialEquipo extends Model
{
    protected $fillable = [
        'nombre',
        'nota'
    ];

    public const PAGINATE = 10;


    //Relación con las atenciones
    public function atncion(): HasMany
    {
        return $this->hasMany(Incidente::class);
    }
    
}
