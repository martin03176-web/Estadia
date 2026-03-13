<?php

namespace App\Services\Atencion;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Atencion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AtencionService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        $query = Atencion::with('paciente');

        // Filtro por nombre del paciente
        if ($request->filled('nombre')) {
            $query->whereHas('paciente', function($q) use ($request) {
                $q->where('nombre', 'LIKE', '%' . $request->nombre . '%');
            });
        }

        // Filtro por carrera/área del paciente
        if ($request->filled('carrera')) {
            $query->whereHas('paciente', function($q) use ($request) {
                $q->where('carrera_area', 'LIKE', '%' . $request->carrera . '%');
            });
        }

        // Filtro por semestre
        if ($request->filled('semestre')) {
            $query->where('semestre', $request->semestre);
        }

        // Filtro por signos y síntomas
        if ($request->filled('signos_sintomas')) {
            $query->where('signos_sintomas', 'LIKE', '%' . $request->signos_sintomas . '%');
        }

        // Filtro por edad con operador
        if ($request->filled('edad') && $request->filled('edad_operator')) {
            $operator = $request->edad_operator;
            $value = $request->edad;
            $query->where('edad', $operator, $value);
        } elseif ($request->filled('edad')) {
            $query->where('edad', $request->edad);
        }

        // Filtro por rango de fechas
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_atencion', [$request->fecha_inicio, $request->fecha_fin]);
        } elseif ($request->filled('fecha_inicio')) {
            $query->whereDate('fecha_atencion', '>=', $request->fecha_inicio);
        } elseif ($request->filled('fecha_fin')) {
            $query->whereDate('fecha_atencion', '<=', $request->fecha_fin);
        }

        return $query->latest()->paginate(Atencion::PAGINATE);
    }

    public function find(int $id): Atencion
    {
        $atencion = Atencion::with('paciente')->find($id);
        
        if (!$atencion) {
            throw new ModelNotFoundException("Atención con ID {$id} no encontrada.");
        }
        
        return $atencion;
    }

    public function create(array $data): Atencion
    {
        return Atencion::create($data);
    }

    public function update(Atencion $atencion, array $data): Atencion
    {
        $atencion->update($data);
        return $atencion;
    }

    public function delete(int $id): bool
    {
        $atencion = $this->find($id);
        return $atencion->delete();
    }
}