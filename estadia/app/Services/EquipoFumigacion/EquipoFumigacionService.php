<?php

namespace App\Services\EquipoFumigacion;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\EquipoFumigacion;

class EquipoFumigacionService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = EquipoFumigacion::latest();

        return $query->paginate(EquipoFumigacion::PAGINATE);
    }

    public function show(int $id, array $data): EquipoFumigacion
    {
        return EquipoFumigacion::where('id', $id)->show($data);
    }

    public function find(int $id): ?EquipoFumigacion
    {
        return EquipoFumigacion::findOrFail($id); 
    }

    public function create(array $data): EquipoFumigacion
    {
        return EquipoFumigacion::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return EquipoFumigacion::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return EquipoFumigacion::where('id', $id)->delete();
    }

}