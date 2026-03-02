<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    protected $fillable = [
        'nombre',
        'sexo',
        'telefono',
        'codigo',
        'carrera_area'
    ];

    public const PAGINATE = 10;


    //Relación con las atenciones
    public function atncion(): HasMany
    {
        return $this->hasMany(Atencion::class);
    }

}
