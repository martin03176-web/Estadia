<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidente extends Model
{
    protected $fillable = [
        'asunto',
        'fecha',
        'area_id',
        'responsable_id',
        'tipo_incidente_id',
        'tipo_riesgo_id',
        'descripcion',
        'nivel_riesgo_id',
        'acciones_correctivas',
        'material_equipo_id',
        'tiempo_total'
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
    public function tipoIncidente(): BelongsTo
    {
        return $this->belongsTo(TipoIncidente::class);
    }
    public function tipoRiesgo(): BelongsTo
    {
        return $this->belongsTo(TipoRiesgo::class);
    }
    public function nivelRiesgo(): BelongsTo
    {
        return $this->belongsTo(NivelRiesgo::class);
    }
    public function materialEquipo(): BelongsTo
    {
        return $this->belongsTo(MaterialEquipo::class);
    }



}
