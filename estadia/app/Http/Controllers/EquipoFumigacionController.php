<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\EquipoFumigacion\EquipoFumigacionRequest;
use App\Services\EquipoFumigacion\EquipoFumigacionService;
use App\Models\EquipoFumigacion;

class EquipoFumigacionController extends Controller
{

    public function __construct(protected EquipoFumigacionService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipoFumigaciones = $this->service->getAll();
        return view('equipoFumigaciones.index', compact('equipoFumigaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipoFumigaciones.form', ['equipoFumigacion'=> new EquipoFumigacion()]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoFumigacionRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('equipoFumigaciones.index')->with('message', 'Equipo de Fumigación creado exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $equipoFumigacion = $this->service->find($id);
        return view('equipoFumigaciones.show', compact('equipoFumigacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $equipoFumigacion = $this->service->find($id);
        return view('equipoFumigaciones.form', compact('equipoFumigacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoFumigacionRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('equipoFumigaciones.index')->with('message', 'Equipo de Fumigación actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('EquipoFumigaciones.index')->with('message', 'Equipo de Fumigación eliminado exitosamente');
    }
}
