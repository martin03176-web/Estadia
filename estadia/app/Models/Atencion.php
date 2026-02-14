<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atencion extends Model
{
    protected $fillable = ['paciente_id','hora_atencion','frecuencia_cardiaca','frecuencia_respiratoria','tension_sistolica','tension_diastolica','temperatura','oxigenacion','glucemia','signos_sintomas','alergias','medicamento','patologia','ultimo_alimento','eventos_previos','destino'];

    public const PAGINATE = 10;

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
    
}
