<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Mantenimiento\MantenimientoRequest;
use App\Services\Mantenimiento\MantenimientoService;
use App\Models\Mantenimiento;

class MantenimientoController extends Controller
{
    public function __construct(protected MantenimientoService $service)
    {}
    // public function __construct(protected PacienteService $service2)
    // {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $mantenimientos = $this->service->getAll();
        
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $extintores = \App\Models\Extintor::orderBy('id')->get();
    return view('mantenimientos.form', [
        'mantenimiento' => new Mantenimiento(),
        'extintores' => $extintores
    ]); 
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(MantenimientoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('mantenimientos.index')->with('message', 'Mantenimiento creado exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mantenimiento = Mantenimiento::with([
            'extintor',
        ])->findOrFail($id);

        return view('mantenimientos.show', compact('mantenimiento'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        $extintores = \App\Models\Extintor::orderBy('id')->get();
        return view('mantenimientos.form', [
            'mantenimiento' => $mantenimiento,
            'extintores' => $extintores
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MantenimientoRequest $request, Mantenimiento $Mantenimiento)
    {
        $this->service->update($Mantenimiento, $request->validated());
        return redirect()->route('mantenimientos.index')->with('message', 'Mantenimiento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('mantenimientos.index')->with('message', 'Mantenimiento Eliminado exitosamente');
    }
}
