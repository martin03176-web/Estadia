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
        if ($request->filled('edificio')) {
            $query->whereHas('area', function($q) use ($request) {
                $q->where('edificio', 'LIKE', '%' . $request->edificio . '%');
            });
        }
        if ($request->filled('piso')) {
            $query->whereHas('area', function($q) use ($request) {
                $q->where('piso', 'LIKE', '%' . $request->piso . '%');
            });
        }
        if ($request->filled('lugar')) {
            $query->whereHas('area', function($q) use ($request) {
                $q->where('lugar', 'LIKE', '%' . $request->lugar . '%');
            });
        }

        // Filtro por responsable
        if ($request->filled('responsable')) {
            $query->whereHas('responsable', function($q) use ($request) {
                $q->where('nombre', 'LIKE', '%' . $request->responsable . '%');
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