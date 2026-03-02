<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Mantenimiento\CreateMantenimientoRequest;
use App\Http\Requests\Mantenimiento\UpdateMantenimientoRequest;
use App\Services\Mantenimiento\MantenimientoService;
//use App\Services\Paciente\PacienteService;
use App\Models\Mantenimiento;
use App\Models\Paciente;

class MantenimientoController extends Controller
{
    public function __construct(protected MantenimientoService $service)
    {}
    // public function __construct(protected PacienteService $service2)
    // {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $Mantenimientos = $this->service->getAll();
        
        return view('Mantenimientos.index', compact('Mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('nombre')->get();
        return view('Mantenimientos.form', ['Mantenimiento'=> new Mantenimiento()] , compact('pacientes')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMantenimientoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('Mantenimientos.index')->with('message', 'Atención creada exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $Mantenimiento= $this->service->find($id);
        return view('Mantenimientos.show', compact('Mantenimiento'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mantenimiento $Mantenimiento)
    {
        
        $pacientes = Paciente::orderBy('nombre')->get();
        return view('Mantenimientos.form', compact('Mantenimiento', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMantenimientoRequest $request, Mantenimiento $Mantenimiento)
    {
        $this->service->update($Mantenimiento, $request->validated());
        return redirect()->route('Mantenimientos.index')->with('message', 'Atención actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('Mantenimientos.index')->with('message', 'Atención Eliminado exitosamente');
    }
}
