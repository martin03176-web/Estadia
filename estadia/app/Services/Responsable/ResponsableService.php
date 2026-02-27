<?php

namespace App\Services\Responsable;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Responsable;

class ResponsableService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Responsable::latest();

        return $query->paginate(Responsable::PAGINATE);
    }

    public function show(int $id, array $data): Responsable
    {
        return Responsable::where('id', $id)->show($data);
    }

    public function find(int $id): ?Responsable
    {
        return Responsable::findOrFail($id); 
    }

    public function create(array $data): Responsable
    {
        return Responsable::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Responsable::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Responsable::where('id', $id)->delete();
    }

}