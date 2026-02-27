<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoIncidente\CreateTipoIncidenteRequest;
use App\Http\Requests\TipoIncidente\UpdateTipoIncidenteRequest;
use App\Services\TipoIncidente\TipoIncidenteService;
use App\Models\TipoIncidente;

class TipoIncidenteController extends Controller
{
    public function __construct(protected TipoIncidenteService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoIncidentes = $this->service->getAll();
        return view('tipoIncidentes.index', compact('tipoIncidentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoIncidentes.form', ['tipoIncidente'=> new TipoIncidente()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTipoIncidenteRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('tipoIncidentes.index')->with('message', 'TipoIncidente creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $tipoIncidente = $this->service->find($id);
        return view('tipoIncidentes.show', compact('tipoIncidente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoIncidente = $this->service->find($id);
        return view('tipoIncidentes.form', compact('tipoIncidente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoIncidenteRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('tipoIncidentes.index')->with('message', 'TipoIncidente actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('tipoIncidentes.index')->with('message', 'TipoIncidente eliminada correctamente');
    }
}
