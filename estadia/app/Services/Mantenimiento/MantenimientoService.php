<?php

namespace App\Services\Mantenimiento;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Mantenimiento;

class MantenimientoService
{
    public function getAll(): LengthAwarePaginator
{
    return Mantenimiento::with('extintor')
        ->latest()
        ->paginate(Mantenimiento::PAGINATE);
}

    public function find(int $id): ?Mantenimiento
    {
    return Mantenimiento::with('paciente')->findOrFail($id); 
    }

    public function create(array $data): Mantenimiento
    {
        
        return Mantenimiento::create($data);
    }

    public function update(Mantenimiento $Mantenimiento, array $data)
    {
        $Mantenimiento->update($data);

        return $Mantenimiento;
    }

    public function delete(int $id): bool
    {
        return Mantenimiento::where('id', $id)->delete();
    }

}