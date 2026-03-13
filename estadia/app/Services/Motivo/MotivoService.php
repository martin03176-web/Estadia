<?php

namespace App\Services\Motivo;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Motivo;

class MotivoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Motivo::latest();

        return $query->paginate(Motivo::PAGINATE);
    }

    public function show(int $id, array $data): Motivo
    {
        return Motivo::where('id', $id)->show($data);
    }

    public function find(int $id): ?Motivo
    {
        return Motivo::findOrFail($id); 
    }

    public function create(array $data): Motivo
    {
        return Motivo::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Motivo::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Motivo::where('id', $id)->delete();
    }

}