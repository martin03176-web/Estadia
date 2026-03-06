<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Paciente\PacienteRequest;
use App\Services\Paciente\PacienteService;
use App\Models\Paciente;

class PacienteController extends Controller
{

    public function __construct(protected PacienteService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = $this->service->getAll();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.form', ['paciente'=> new Paciente()]); // paciente => new Paciente se elimina 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PacienteRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('pacientes.index')->with('message', 'Paciente creado exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    // public function show(int $id)
    // {
    //     $paciente = $this->service->find($id);
    //     return view('pacientes.show', compact('paciente'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $paciente = $this->service->find($id);
        return view('pacientes.form', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PacienteRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('pacientes.index')->with('message', 'Paciente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('pacientes.index')->with('message', 'Paciente Eliminado exitosamente');
    }
}
