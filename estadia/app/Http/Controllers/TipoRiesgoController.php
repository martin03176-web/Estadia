<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoRiesgo\CreateTipoRiesgoRequest;
use App\Http\Requests\TipoRiesgo\UpdateTipoRiesgoRequest;
use App\Services\TipoRiesgo\TipoRiesgoService;
use App\Models\TipoRiesgo;

class TipoRiesgoController extends Controller
{
    public function __construct(protected TipoRiesgoService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoRiesgos = $this->service->getAll();
        return view('tipoRiesgos.index', compact('tipoRiesgos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoRiesgos.form', ['tipoRiesgo'=> new TipoRiesgo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTipoRiesgoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('tipoRiesgos.index')->with('message', 'TipoRiesgo creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $tipoRiesgo = $this->service->find($id);
        return view('tipoRiesgos.show', compact('tipoRiesgo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoRiesgo = $this->service->find($id);
        return view('tipoRiesgos.form', compact('tipoRiesgo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoRiesgoRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('tipoRiesgos.index')->with('message', 'TipoRiesgo actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('tipoRiesgos.index')->with('message', 'TipoRiesgo eliminada correctamente');
    }
}
