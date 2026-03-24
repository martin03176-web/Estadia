<?php

namespace App\Services\Fumigacion;

use App\Models\Area;
use App\Models\Fumigacion;
use App\Models\FumigacionPeriodo;
use App\Models\Responsable;
use Carbon\Carbon;

class FumigacionService
{
    public function getAll()
    {
        return Fumigacion::with(['area', 'responsableServicio', 'equipoFumigacion', 'motivo', 'periodo'])
            ->latest()
            ->paginate(Fumigacion::PAGINATE);
    }

    public function find(int $id): ?Fumigacion
    {
        return Fumigacion::with([
            'area',
            'responsableServicio',
            'responsableTitular',
            'responsableContingencia',
            'responsableFumigacion',
            'equipoFumigacion',
            'motivo',
            'periodo'
        ])->findOrFail($id);
    }

    public function create(array $data): Fumigacion
    {
        return Fumigacion::create($data);
    }

    public function update(Fumigacion $fumigacion, array $data): Fumigacion
    {
        $fumigacion->update($data);
        return $fumigacion;
    }

    public function delete(int $id): bool
    {
        return Fumigacion::destroy($id);
    }

    public function crearPeriodo($anio, $temporada, $fechaInicio = null, $fechaFin = null)
    {
        // Verificar si ya existe
        $existe = FumigacionPeriodo::where('anio', $anio)
            ->where('temporada', $temporada)
            ->exists();

        if ($existe) {
            throw new \Exception('Ya existe un periodo para este año y temporada');
        }

        // Crear el periodo
        $periodo = FumigacionPeriodo::create([
            'anio' => $anio,
            'temporada' => $temporada,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
            'activo' => true
        ]);

        return $periodo;
    }

    public function crearPeriodoConFumigaciones(FumigacionPeriodo $periodo)
    {
        // Obtener áreas activas
        $areas = Area::all();
        
        // Obtener responsables por defecto (puedes personalizar esto)
        $responsableDefault = Responsable::first();
        
        if (!$responsableDefault) {
            throw new \Exception('No hay responsables registrados. Crea al menos un responsable primero.');
        }

        // Fechas por temporada
        $fechasPorTemporada = [
            'primavera' => ['mes' => 3, 'dia' => 21],
            'verano' => ['mes' => 6, 'dia' => 21],
            'otoño' => ['mes' => 9, 'dia' => 21],
            'invierno' => ['mes' => 12, 'dia' => 21]
        ];

        $fechaBase = $fechasPorTemporada[$periodo->temporada];
        $fechaProgramada = Carbon::create($periodo->anio, $fechaBase['mes'], $fechaBase['dia']);

        // Crear fumigaciones para cada área
        foreach ($areas as $area) {
            Fumigacion::create([
                'periodo_id' => $periodo->id,
                'tipo' => Fumigacion::TIPO_PROGRAMADA,
                'area_id' => $area->id,
                'fecha_hora' => $fechaProgramada->format('Y-m-dth:mi:ss'),
                'motivo_id' => 1, 
                'responsble_servicio_id' => $responsableDefault->id,
                'responsable_titular_id' => $responsableDefault->id,
                'responsable_contingencia_id' => $responsableDefault->id,
                'responsable_fumigacion_id' => $responsableDefault->id,
                'equipo_fumigacion_id' => 1, 
            ]);
        }

        return $periodo;
    }

    public function obtenerPeriodosDisponibles()
    {
        return FumigacionPeriodo::where('activo', true)
            ->orderBy('anio', 'desc')
            ->orderBy('temporada', 'desc')
            ->get();
    }
}