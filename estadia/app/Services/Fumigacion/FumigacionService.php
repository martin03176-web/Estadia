<?php

namespace App\Services\Fumigacion;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Fumigacion;


class FumigacionService
{
    public function getAllOrdenado(): LengthAwarePaginator
{
    return Fumigacion::with(['area', 'responsable', 'EquipoFumigacion'])
        ->join('areas', 'fumigacions.area_id', '=', 'areas.id')
        ->orderByRaw("FIELD(areas.edificio, 
            'F', 'A', 'F1', 'B', 'F2', 'C', 'F3', 'D', 'F4', 'E', 'F5', 'G', 'H', 'I', 'J', 'Nave')")
        ->select('fumigacions.*')
        ->latest('fumigacions.created_at')
        ->paginate(Fumigacion::PAGINATE);
}

    public function show(int $id, array $data): Fumigacion
    {
        return Fumigacion::where('id', $id)->show($data);
    }

    public function find(int $id): ?Fumigacion
    {
        return Fumigacion::with([
            'area', 
            'responsable', 
            'EquipoFumigacion'
        ])->findOrFail($id); 
    }

    public function create(array $data): Fumigacion
    {
        return Fumigacion::create($data);
    }

    public function update(Fumigacion $fumigacion, array $data)
    {
        $fumigacion->update($data);

        return $fumigacion;
    }

    public function delete(int $id): bool
    {
        return Fumigacion::where('id', $id)->delete();
    }

}