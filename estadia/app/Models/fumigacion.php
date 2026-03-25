<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fumigacion extends Model
{
    protected $table = 'fumigacions';

    protected $fillable = [
        'periodo_id',
        'tipo',
        'area_id',
        'fecha',
        'hora',
        'motivo_id',
        'responsble_servicio_id',
        'responsable_titular_id',
        'responsable_contingencia_id',
        'responsable_fumigacion_id',
        'equipo_fumigacion_id'  
    ];

    public const PAGINATE = 10;
    public const TIPO_PROGRAMADA = 'programada';
    public const TIPO_EXTEMPORANEA = 'extemporanea';

     // Relaciones
     public function area(): BelongsTo
     {
         return $this->belongsTo(Area::class);
     }
 
     public function equipoFumigacion(): BelongsTo
     {
         return $this->belongsTo(EquipoFumigacion::class);
     }
 
     public function motivo(): BelongsTo
     {
         return $this->belongsTo(Motivo::class);
     }
 
     public function responsableServicio(): BelongsTo
     {
         return $this->belongsTo(Responsable::class, 'responsble_servicio_id');
     }
 
     public function responsableTitular(): BelongsTo
     {
         return $this->belongsTo(Responsable::class, 'responsable_titular_id');
     }
 
     public function responsableContingencia(): BelongsTo
     {
         return $this->belongsTo(Responsable::class, 'responsable_contingencia_id');
     }
 
     public function responsableFumigacion(): BelongsTo
     {
         return $this->belongsTo(Responsable::class, 'responsable_fumigacion_id');
     }
 
     public function periodo(): BelongsTo
     {
         return $this->belongsTo(FumigacionPeriodo::class, 'periodo_id');
     }
 }
