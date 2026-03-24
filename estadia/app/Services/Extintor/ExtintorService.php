<?php

namespace App\Services\Extintor;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Extintor;


class ExtintorService
{
    public function getAll(): LengthAwarePaginator
    {
        return Extintor::with([
            'area', 
            'tipo'
        ])->latest()->paginate(Extintor::PAGINATE);
    }

    public function show(int $id, array $data): Extintor
    {
        return Extintor::where('id', $id)->show($data);
    }

    public function find(int $id): ?Extintor
    {
        return Extintor::with([
            'area', 
            'tipo', 
        ])->findOrFail($id); 
    }

    public function create(array $data): Extintor
    {
        return Extintor::create($data);
    }

    public function update(Extintor $Extintor, array $data)
    {
        $Extintor->update($data);

        return $Extintor;
    }

    public function delete(int $id): bool
    {
        return Extintor::where('id', $id)->delete();
    }

}