<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extintor extends Model
{
    protected $fillable = [
        'clave_id',
        'numeracion',
        'fecha_adquisicion',
        'area_id',
        'tipo_id',
        'peso',
        'ubicacion',
        'lugar_referencia',
        'condicion_extintor',
        'observaciones',
    ];

    public const PAGINATE = 10;

    public function area(): BelongsTo
    {
    return $this->belongsTo(Area::class); 
    }
    public function clave(): BelongsTo
    {
    return $this->belongsTo(Clave::class); 
    }
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }

}
