<?php

namespace App\Services\Incidente;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Incidente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class IncidenteService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        $query = Incidente::with(['area', 'responsable', 'tipoIncidente', 'tipoRiesgo', 'nivelRiesgo', 'materialEquipo']);

        // Filtro por asunto
        if ($request->filled('asunto')) {
            $query->where('asunto', 'LIKE', '%' . $request->asunto . '%');
        }

        // Filtro por rango de fechas
        if ($request->filled('fecha_desde')) {
            $query->whereDate('fecha', '>=', $request->fecha_desde);
        }
        if ($request->filled('fecha_hasta')) {
            $query->whereDate('fecha', '<=', $request->fecha_hasta);
        }

        // Filtros por área
        if ($request->filled('tipo_establecimiento')) {
            $query->whereHas('area', function ($q) use ($request) {
                $q->where('tipo_establecimiento', $request->tipo_establecimiento);
            });
        }
        if ($request->filled('nivel')) {
            $query->whereHas('area', function($q) use ($request) {
                $q->where('nivel', 'LIKE', '%' . $request->nivel . '%');
            });
        }
        if ($request->filled('lugar_especifico')) {
            $query->whereHas('area', function ($q) use ($request) {
                $q->where('lugar_especifico', 'LIKE', '%' . $request->lugar_especifico . '%');
            });
        }

        // Filtros por IDs de tablas relacionadas
        if ($request->filled('tipo_incidente_id')) {
            $query->where('tipo_incidente_id', $request->tipo_incidente_id);
        }
        if ($request->filled('tipo_riesgo_id')) {
            $query->where('tipo_riesgo_id', $request->tipo_riesgo_id);
        }
        if ($request->filled('nivel_riesgo_id')) {
            $query->where('nivel_riesgo_id', $request->nivel_riesgo_id);
        }

        return $query->latest('fecha')->paginate(10);
    }

    public function find(int $id): Incidente
    {
        $incidente = Incidente::with(['area', 'responsable', 'tipoIncidente', 'tipoRiesgo', 'nivelRiesgo', 'materialEquipo'])
            ->find($id);
        
        if (!$incidente) {
            throw new ModelNotFoundException("Incidente con ID {$id} no encontrado.");
        }
        
        return $incidente;
    }

    public function create(array $data): Incidente
    {
        return Incidente::create($data);
    }

    public function update(Incidente $incidente, array $data): Incidente
    {
        $incidente->update($data);
        return $incidente;
    }

    public function delete(int $id): bool
    {
        $incidente = $this->find($id);
        return $incidente->delete();
    }
}