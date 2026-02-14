<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Atencion\CreateAtencionRequest;
use App\Http\Requests\Atencion\UpdateAtencionRequest;
use App\Services\Atencion\AtencionService;
use App\Services\Paciente\PacienteService;
use App\Models\Atencion;
use App\Models\Paciente;

class AtencionController extends Controller
{
    public function __construct(protected AtencionService $service)
    {}
    // public function __construct(protected PacienteService $service2)
    // {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $atencions = $this->service->getAll();
        
        return view('atencions.index', compact('atencions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('nombre')->get();
        return view('atencions.form', ['atencion'=> new Atencion()] , compact('pacientes')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAtencionRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('atencions.index')->with('message', 'Atención creada exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $atencions = $this->service->find($id);
        
        return view('atencions.show', compact('atencion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atencion $atencion)
    {
        
        $pacientes = Paciente::orderBy('nombre')->get();
        return view('atencions.form', compact('atencion', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtencionRequest $request, Atencion $atencion)
    {
        $this->service->update($atencion, $request->validated());

        return redirect()->route('atencions.index')->with('message', 'Atención actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('atencions.index')->with('message', 'Atención Eliminado exitosamente');
    }
}
