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

        // Filtro por código del paciente
        if ($request->filled('codigo')) {
            $query->whereHas('paciente', function($q) use ($request) {
                $q->where('codigo', 'LIKE', '%' . $request->codigo . '%');
            });
        }

        // Filtro por carrera/área del paciente
        if ($request->filled('carrera')) {
            $query->whereHas('paciente', function($q) use ($request) {
                $q->where('carrera_area', 'LIKE', '%' . $request->carrera . '%');
            });
        }

        // Filtro por edad con operador
        if ($request->filled('edad') && $request->filled('edad_operator')) {
            $operator = $request->edad_operator;
            $value = $request->edad;
            $query->where('edad', $operator, $value);
        } elseif ($request->filled('edad')) {
            $query->where('edad', $request->edad);
        }

        // Filtro por semestre
        if ($request->filled('semestre')) {
            $query->where('semestre', 'LIKE', '%' . $request->semestre . '%');
        }

        // Filtro por destino
        if ($request->filled('destino')) {
            $query->where('destino', $request->destino);
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