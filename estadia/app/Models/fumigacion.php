<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fumigacion extends Model
{
    protected $fillable = [
        'responsble_servicio_id',
        'area_id',
        'responsable_titular_id',
        'fecha',
        'motivo_id',
        'responsable_contingencia_id',
        'equipo_fumigacion_id',
        'responsable_fumigacion_id'
    ];

    public const PAGINATE = 10;

    public function area(): BelongsTo
    {
    return $this->belongsTo(Area::class); 
    }
    public function responsable(): BelongsTo
    {
        return $this->belongsTo(Responsable::class);
    }
    public function equipoFumigacion(): BelongsTo
    {
        return $this->belongsTo(EquipoFumigacion::class);
    }
    public function motivo(): BelongsTo
    {
        return $this->belongsTo(Motivo::class);
    }



}
