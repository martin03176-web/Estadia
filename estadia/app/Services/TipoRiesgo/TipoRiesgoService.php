<?php

namespace App\Services\TipoRiesgo;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\TipoRiesgo;

class TipoRiesgoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = TipoRiesgo::latest();

        return $query->paginate(TipoRiesgo::PAGINATE);
    }

    public function show(int $id, array $data): TipoRiesgo
    {
        return TipoRiesgo::where('id', $id)->show($data);
    }

    public function find(int $id): ?TipoRiesgo
    {
        return TipoRiesgo::findOrFail($id); 
    }

    public function create(array $data): TipoRiesgo
    {
        return TipoRiesgo::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return TipoRiesgo::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return TipoRiesgo::where('id', $id)->delete();
    }

}