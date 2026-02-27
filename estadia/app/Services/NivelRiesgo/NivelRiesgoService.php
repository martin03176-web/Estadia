<?php

namespace App\Services\NivelRiesgo;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\NivelRiesgo;

class NivelRiesgoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = NivelRiesgo::latest();

        return $query->paginate(NivelRiesgo::PAGINATE);
    }

    public function show(int $id, array $data): NivelRiesgo
    {
        return NivelRiesgo::where('id', $id)->show($data);
    }

    public function find(int $id): ?NivelRiesgo
    {
        return NivelRiesgo::findOrFail($id); 
    }

    public function create(array $data): NivelRiesgo
    {
        return NivelRiesgo::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return NivelRiesgo::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return NivelRiesgo::where('id', $id)->delete();
    }

}