<?php

namespace App\Services\Incidente;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Incidente;

class IncidenteService
{
    public function getAll(): LengthAwarePaginator
    {
        return Incidente::with([
            'area',
            'responsable',
            'tipoIncidente',
            'tipoRiesgo',
            'nivelRiesgo',
            'materialEquipo'
        ])->latest()->paginate(Incidente::PAGINATE);
    }

    public function find(int $id): ?Incidente
    {
        return Incidente::with([
            'area',
            'responsable',
            'tipoIncidente',
            'tipoRiesgo',
            'nivelRiesgo',
            'materialEquipo'
        ])->findOrFail($id);
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
        return Incidente::where('id', $id)->delete();
    }
}