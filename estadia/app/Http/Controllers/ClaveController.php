<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Clave\ClaveRequest;
use App\Services\Clave\ClaveService;
use App\Models\Clave;

class ClaveController extends Controller
{
    public function __construct(protected ClaveService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claves = $this->service->getAll();
        return view('claves.index', compact('claves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('claves.form', ['clave'=> new Clave()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClaveRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('claves.index')->with('message', 'clave creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $Clave = $this->service->find($id);
        return view('claves.show', compact('clave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clave = $this->service->find($id);
        return view('claves.form', compact('clave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClaveRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('claves.index')->with('message', 'Clave actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('claves.index')->with('message', 'Clave eliminada correctamente');
    }
}
