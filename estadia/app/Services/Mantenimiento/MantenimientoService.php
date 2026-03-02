<?php

namespace App\Services\Mantenimientos;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Mantenimientos;

class MantenimientosService
{
    public function getAll(): LengthAwarePaginator
    {
    return Mantenimientos::with('paciente')
        ->latest()
        ->paginate(Mantenimientos::PAGINATE);
    }

    public function find(int $id): ?Mantenimientos
    {
    return Mantenimientos::with('paciente')->findOrFail($id); 
    }

    public function create(array $data): Mantenimientos
    {
        
        return Mantenimientos::create($data);
    }

    public function update(Mantenimientos $Mantenimientos, array $data)
    {
        $Mantenimientos->update($data);

        return $Mantenimientos;
    }

    public function delete(int $id): bool
    {
        return Mantenimientos::where('id', $id)->delete();
    }

}