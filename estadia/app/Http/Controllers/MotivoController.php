<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Motivo\MotivoRequest;
use App\Services\Motivo\MotivoService;
use App\Models\Motivo;

class MotivoController extends Controller
{
    public function __construct(protected MotivoService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motivos = $this->service->getAll();
        return view('motivos.index', compact('motivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motivos.form', ['motivo'=> new Motivo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotivoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('motivos.index')->with('message', 'Motivo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $motivo = $this->service->find($id);
        return view('motivos.show', compact('motivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $motivo = $this->service->find($id);
        return view('motivos.form', compact('motivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MotivoRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('motivos.index')->with('message', 'motivo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('motivos.index')->with('message', 'motivo eliminado correctamente');
    }
}
