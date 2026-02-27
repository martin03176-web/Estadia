<?php

namespace App\Services\TipoIncidente;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\TipoIncidente;

class TipoIncidenteService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = TipoIncidente::latest();

        return $query->paginate(TipoIncidente::PAGINATE);
    }

    public function show(int $id, array $data): TipoIncidente
    {
        return TipoIncidente::where('id', $id)->show($data);
    }

    public function find(int $id): ?TipoIncidente
    {
        return TipoIncidente::findOrFail($id); 
    }

    public function create(array $data): TipoIncidente
    {
        return TipoIncidente::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return TipoIncidente::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return TipoIncidente::where('id', $id)->delete();
    }

}