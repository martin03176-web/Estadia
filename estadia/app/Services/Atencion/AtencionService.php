<?php

namespace App\Services\Atencion;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Atencion;
use App\Models\Paciente;

class AtencionService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Atencion::latest();
        $query = Paciente::latest();

        return Atencion::with('paciente')->paginate(10);
        return $query->paginate(Atencion::PAGINATE);
        
    }

    public function show(int $id, array $data): Atencion
    {
        return Atencion::where('id', $id)->show($data);
    }

    public function find(int $id): ?Atencion
    {
        return Atencion::findOrFail($id); 
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