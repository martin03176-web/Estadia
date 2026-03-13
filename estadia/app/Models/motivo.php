<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Motivo extends Model
{
    protected $fillable = [
        'descripcion',
    ];

    public const PAGINATE = 10;


    //Relación con las atenciones
    public function atncion(): HasMany
    {
        return $this->hasMany(Fumigacion::class);
    }
    
}
