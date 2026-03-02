<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mantenimiento extends Model
{
    protected $fillable = [
        'extintor_id',
        'fecha',
        'tipo',
    ];

    public const PAGINATE = 10;


    //Relación con las incidencias
    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Extintor::class);
    }
   
}
