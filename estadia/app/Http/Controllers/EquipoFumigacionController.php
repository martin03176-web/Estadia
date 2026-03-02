<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\EquipoFumigacion\CreateEquipoFumigacionRequest;
use App\Http\Requests\EquipoFumigacion\UpdateEquipoFumigacionRequest;
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
        $equipoFumigacions = $this->service->getAll();
        return view('equipoFumigacions.index', compact('equipoFumigacions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipoFumigacions.form', ['equipoFumigacion'=> new EquipoFumigacion()]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEquipoFumigacionRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('equipoFumigacions.index')->with('message', '');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $equipoFumigacion = $this->service->find($id);
        return view('equipoFumigacions.show', compact('equipoFumigacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $equipoFumigacion = $this->service->find($id);
        return view('equipoFumigacions.form', compact('equipoFumigacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipoFumigacionRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('equipoFumigacions.index')->with('message', '');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('EquipoFumigacions.index')->with('message', '');
    }
}
