<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NivelRiesgo\CreateNivelRiesgoRequest;
use App\Http\Requests\NivelRiesgo\UpdateNivelRiesgoRequest;
use App\Services\NivelRiesgo\NivelRiesgoService;
use App\Models\NivelRiesgo;

class NivelRiesgoController extends Controller
{
    public function __construct(protected NivelRiesgoService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nivelRiesgos = $this->service->getAll();
        return view('nivelRiesgos.index', compact('nivelRiesgos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nivelRiesgos.form', ['nivelRiesgo'=> new NivelRiesgo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNivelRiesgoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('nivelRiesgos.index')->with('message', 'NivelRiesgo creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $nivelRiesgo = $this->service->find($id);
        return view('nivelRiesgos.show', compact('nivelRiesgo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nivelRiesgo = $this->service->find($id);
        return view('nivelRiesgos.form', compact('nivelRiesgo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNivelRiesgoRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('nivelRiesgos.index')->with('message', 'NivelRiesgo actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('nivelRiesgos.index')->with('message', 'NivelRiesgo eliminada correctamente');
    }
}
