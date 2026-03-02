<?php

namespace App\Services\Clave;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Clave;

class ClaveService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Clave::latest();

        return $query->paginate(Clave::PAGINATE);
    }

    public function show(int $id, array $data): Clave
    {
        return Clave::where('id', $id)->show($data);
    }

    public function find(int $id): ?Clave
    {
        return Clave::findOrFail($id); 
    }

    public function create(array $data): Clave
    {
        return Clave::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Clave::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Clave::where('id', $id)->delete();
    }

}