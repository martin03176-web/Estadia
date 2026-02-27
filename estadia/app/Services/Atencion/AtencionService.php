<?php

namespace App\Services\Atencion;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Atencion;

class AtencionService
{
    public function getAll(): LengthAwarePaginator
    {
    return Atencion::with('paciente')
        ->latest()
        ->paginate(Atencion::PAGINATE);
    }

    public function find(int $id): ?Atencion
    {
    return Atencion::with('paciente')->findOrFail($id); 
    }

    public function create(array $data): Atencion
    {
        
        return Atencion::create($data);
    }

    public function update(Atencion $atencion, array $data)
    {
        $atencion->update($data);

        return $atencion;
    }

    public function delete(int $id): bool
    {
        return Atencion::where('id', $id)->delete();
    }

}