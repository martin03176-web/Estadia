<?php

namespace App\Services\Incidente;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function show(int $id, array $data): Incidente
    {
        return Incidente::where('id', $id)->show($data);
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

    public function update(Incidente $Incidente, array $data)
    {
        $Incidente->update($data);

        return $Incidente;
    }

    public function delete(int $id): bool
    {
        return Incidente::where('id', $id)->delete();
    }

}