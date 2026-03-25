<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FumigacionPeriodo extends Model
{
    
    protected $table = 'fumigacion_periodos';
    
    protected $fillable = [
        'anio', 
        'temporada', 
        'fecha_inicio', 
        'fecha_fin', 
        'descripcion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];

    public function fumigaciones()
    {
        return $this->hasMany(Fumigacion::class, 'periodo_id');
    }

    public function getNombreAttribute()
    {
        $temporadas = [
            'primavera' => 'Primavera',
            'verano' => 'Verano',
            'otoño' => 'Otoño',
            'invierno' => 'Invierno'
        ];
        
        return $this->anio . ' - ' . ($temporadas[$this->temporada] ?? $this->temporada);
    }

    public function getTemporadaNombreAttribute()
    {
        $temporadas = [
            'primavera' => 'Primavera',
            'verano' => 'Verano',
            'otoño' => 'Otoño',
            'invierno' => 'Invierno'
        ];
        
        return $temporadas[$this->temporada] ?? $this->temporada;
    }
}