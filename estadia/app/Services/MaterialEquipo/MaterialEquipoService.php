<?php

namespace App\Services\MaterialEquipo;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\MaterialEquipo;

class MaterialEquipoService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = MaterialEquipo::latest();

        return $query->paginate(MaterialEquipo::PAGINATE);
    }

    public function show(int $id, array $data): MaterialEquipo
    {
        return MaterialEquipo::where('id', $id)->show($data);
    }

    public function find(int $id): ?MaterialEquipo
    {
        return MaterialEquipo::findOrFail($id); 
    }

    public function create(array $data): MaterialEquipo
    {
        return MaterialEquipo::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return MaterialEquipo::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return MaterialEquipo::where('id', $id)->delete();
    }

}