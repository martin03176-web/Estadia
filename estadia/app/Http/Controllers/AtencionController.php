<?php

namespace App\Http\Controllers;

use App\Http\Requests\Atencion\AtencionRequest;
use App\Services\Atencion\AtencionService;
use App\Models\Atencion;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function __construct(protected AtencionService $service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $atenciones = $this->service->getAll($request);
        return view('atenciones.index', compact('atenciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('nombre')->get();
        return view('atenciones.form', ['atencion' => new Atencion()], compact('pacientes')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtencionRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('atenciones.index')->with('status', 'Atención creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $atencion = $this->service->find($id);
            return view('atenciones.show', compact('atencion'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('atenciones.index')->with('error', 'Atención no encontrada');
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        try {
            $pacientes = Paciente::orderBy('nombre')->get();
            $atencion = $this->service->find($id);
            return view('atenciones.form', compact('atencion', 'pacientes'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('atenciones.index')->with('error', 'Atención no encontrada');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtencionRequest $request, int $id)
    {
        try {
            $atencion = $this->service->find($id);
            $this->service->update($atencion, $request->validated());
            return redirect()->route('atenciones.index')->with('status', 'Atención actualizada exitosamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('atenciones.index')->with('error', 'Atención no encontrada');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->service->delete($id);
            return redirect()->route('atenciones.index')->with('status', 'Atención Eliminada exitosamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('atenciones.index')->with('error', 'Atención no encontrada');
        }
    }
}