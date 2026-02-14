<?php

namespace App\Services\Paciente;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Paciente;

class PacienteService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = Paciente::latest();

        return $query->paginate(Paciente::PAGINATE);
    }

    public function show(int $id, array $data): Paciente
    {
        return Paciente::where('id', $id)->show($data);
    }

    public function find(int $id): ?Paciente
    {
        return Paciente::findOrFail($id); 
    }

    public function create(array $data): Paciente
    {
        return Paciente::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Paciente::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Paciente::where('id', $id)->delete();
    }

}