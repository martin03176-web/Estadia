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
        $areas = Area::all();
        $responsableDefault = Responsable::first();
        
        $fechasPorTemporada = [
            'primavera' => ['mes' => 3, 'dia' => 21],
            'verano' => ['mes' => 6, 'dia' => 21],
            'otoño' => ['mes' => 9, 'dia' => 21],
            'invierno' => ['mes' => 12, 'dia' => 21]
        ];
        
        $fechaBase = $fechasPorTemporada[$periodo->temporada];
        $fechaProgramada = Carbon::create($periodo->anio, $fechaBase['mes'], $fechaBase['dia']);
        
        // Hora por defecto si no está configurada en el periodo
        $horaInicio = $periodo->hora_inicio ?? '08:00:00';
        $horaFin = $periodo->hora_fin ?? '17:00:00';
        
        foreach ($areas as $index => $area) {
            // Distribuir horas entre inicio y fin
            $totalAreas = $areas->count();
            $progreso = $index / max($totalAreas - 1, 1);
            
            $horaInicioCarbon = Carbon::createFromFormat('H:i:s', $horaInicio);
            $horaFinCarbon = Carbon::createFromFormat('H:i:s', $horaFin);
            $diferencia = $horaInicioCarbon->diffInSeconds($horaFinCarbon);
            $horaAsignada = $horaInicioCarbon->addSeconds($diferencia * $progreso);
            
            Fumigacion::create([
                'periodo_id' => $periodo->id,
                'tipo' => Fumigacion::TIPO_PROGRAMADA,
                'area_id' => $area->id,
                'fecha' => $fechaProgramada->format('Y-m-d'),
                'hora' => $horaAsignada->format('H:i:s'),
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
