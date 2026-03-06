<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Atencion\AtencionRequest;
use App\Services\Atencion\AtencionService;
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
        
        $atenciones = $this->service->getAll();
        
        return view('atenciones.index', compact('atenciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('nombre')->get();
        return view('atenciones.form', ['atencion'=> new Atencion()] , compact('pacientes')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtencionRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('atenciones.index')->with('message', 'Atención creada exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $atencion = $this->service->find($id);
        return view('atenciones.show', compact('atencion'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        
        $pacientes = Paciente::orderBy('nombre')->get();
        $atencion = $this->service->find($id);
        return view('atenciones.form', compact('atencion', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtencionRequest $request, Atencion $atencion)
    {
        $this->service->update($atencion, $request->validated());

        return redirect()->route('atenciones.index')->with('message', 'Atención actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('atenciones.index')->with('message', 'Atención Eliminada exitosamente');
    }
}
