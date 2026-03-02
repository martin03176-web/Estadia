<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoIncidente extends Model
{
    protected $fillable = [
        'tipo'
    ];

    public const PAGINATE = 10;


    //Relación con las incidencias
    public function atncion(): HasMany
    {
        return $this->hasMany(Incidente::class);
    }
}
