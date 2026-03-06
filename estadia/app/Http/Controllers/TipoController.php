<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Tipo\TipoRequest;
use App\Services\Tipo\TipoService;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function __construct(protected TipoService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = $this->service->getAll();
        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.form', ['tipo'=> new Tipo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('tipos.index')->with('message', 'Tipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $tipo = $this->service->find($id);
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo = $this->service->find($id);
        return view('tipos.form', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('tipos.index')->with('message', 'Tipo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('tipos.index')->with('message', 'Tipo eliminado correctamente');
    }
}
