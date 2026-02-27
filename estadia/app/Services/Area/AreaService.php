<?php

namespace App\Services\Area;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Area;

class AreaService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Area::latest();

        return $query->paginate(Area::PAGINATE);
    }

    public function show(int $id, array $data): Area
    {
        return Area::where('id', $id)->show($data);
    }

    public function find(int $id): ?Area
    {
        return Area::findOrFail($id); 
    }

    public function create(array $data): Area
    {
        return Area::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Area::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Area::where('id', $id)->delete();
    }

}