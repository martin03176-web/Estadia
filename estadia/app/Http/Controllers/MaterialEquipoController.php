<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\MaterialEquipo\MaterialEquipoRequest;
use App\Services\MaterialEquipo\MaterialEquipoService;
use App\Models\MaterialEquipo;

class MaterialEquipoController extends Controller
{

    public function __construct(protected MaterialEquipoService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materialEquipos = $this->service->getAll();
        return view('materialEquipos.index', compact('materialEquipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materialEquipos.form', ['materialEquipo'=> new MaterialEquipo()]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialEquipoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('materialEquipos.index')->with('message', 'Mantenimiento creado exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $materialEquipo = $this->service->find($id);
        return view('materialEquipos.show', compact('materialEquipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $materialEquipo = $this->service->find($id);
        return view('materialEquipos.form', compact('materialEquipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialEquipoRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('materialEquipos.index')->with('message', 'Mantenimiento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('materialEquipos.index')->with('message', 'Mantenimiento Eliminado exitosamente');
    }
}
