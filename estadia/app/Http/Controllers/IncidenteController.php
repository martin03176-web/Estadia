<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Incidente\CreateIncidenteRequest;
use App\Http\Requests\Incidente\UpdateIncidenteRequest;
use App\Services\Incidente\IncidenteService;

use App\Models\Incidente;
use App\Models\Area;
use App\Models\Responsable;
use App\Models\MaterialEquipo;
use App\Models\TipoIncidente;
use App\Models\TipoRiesgo;
use App\Models\NivelRiesgo;


class IncidenteController extends Controller
{
    public function __construct(protected IncidenteService $service)
    {}
    // public function __construct(protected IncidenteService $service2)
    // {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $incidentes = $this->service->getAll();
        return view('incidentes.index', compact('incidentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::orderBy('edificio')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $tipoIncidentes = TipoIncidente::orderBy('tipo')->get();
        $tipoRiesgos = TipoRiesgo::orderBy('tipo')->get();
        $nivelRiesgos = NivelRiesgo::orderBy('nivel')->get();
        $materialEquipos = MaterialEquipo::orderBy('nombre')->get();
        return view('incidentes.form', ['incidente'=> new Incidente()] , compact('areas','responsables','tipoIncidentes','tipoRiesgos','nivelRiesgos','materialEquipos')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateIncidenteRequest $request)
    {
        \Log::info('=== NUEVO INCIDENTE ===');
        \Log::info('Datos completos:', $request->all());
        \Log::info('Datos validados:', $request->validated());
        
        // Verificar específicamente los IDs
        \Log::info('area_id:', [$request->input('area_id')]);
        \Log::info('responsable_id:', [$request->input('responsable_id')]);
        \Log::info('tipo_incidente_id:', [$request->input('tipo_incidente_id')]);
        \Log::info('descripcion:', [$request->input('descripcion')]);
        
        try {
            $incidente = $this->service->create($request->validated());
            \Log::info('Incidente creado con ID: ' . $incidente->id);
            
            return redirect()->route('incidentes.index')
                ->with('message', 'Atención creada exitosamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear incidente: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Error al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $Incidentes = $this->service->find($id);
        
        return view('Incidentes.show', compact('Incidente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidente $Incidente)
    {
        
        $Incidentes = Incidente::orderBy('nombre')->get();
        return view('Incidentes.form', compact('Incidente', 'Incidentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidenteRequest $request, Incidente $Incidente)
    {
        $this->service->update($Incidente, $request->validated());

        return redirect()->route('Incidentes.index')->with('message', 'Atención actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('Incidentes.index')->with('message', 'Atención Eliminado exitosamente');
    }
}
