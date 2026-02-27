<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Responsable\CreateResponsableRequest;
use App\Http\Requests\Responsable\UpdateResponsableRequest;
use App\Services\Responsable\ResponsableService;
use App\Models\Responsable;

class ResponsableController extends Controller
{

    public function __construct(protected ResponsableService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsables = $this->service->getAll();
        return view('responsables.index', compact('responsables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('responsables.form', ['responsable'=> new Responsable()]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateResponsableRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('responsables.index')->with('message', 'Responsable creado exitosamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $responsable = $this->service->find($id);
        return view('responsables.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $responsable = $this->service->find($id);
        return view('responsables.form', compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponsableRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('responsables.index')->with('message', 'Responsable actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('responsables.index')->with('message', 'Responsable Eliminado exitosamente');
    }
}
