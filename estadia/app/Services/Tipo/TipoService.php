<?php

namespace App\Services\Tipo;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Tipo;

class TipoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Tipo::latest();

        return $query->paginate(Tipo::PAGINATE);
    }

    public function show(int $id, array $data): Tipo
    {
        return Tipo::where('id', $id)->show($data);
    }

    public function find(int $id): ?Tipo
    {
        return Tipo::findOrFail($id); 
    }

    public function create(array $data): Tipo
    {
        return Tipo::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Tipo::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Tipo::where('id', $id)->delete();
    }

}