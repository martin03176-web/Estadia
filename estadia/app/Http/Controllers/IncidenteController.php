<?php

namespace App\Http\Controllers;

use App\Http\Requests\Incidente\IncidenteRequest;
use App\Services\Incidente\IncidenteService;
use App\Models\Incidente;
use App\Models\Area;
use App\Models\Responsable;
use App\Models\TipoIncidente;
use App\Models\TipoRiesgo;
use App\Models\NivelRiesgo;
use App\Models\MaterialEquipo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class IncidenteController extends Controller
{
    public function __construct(protected IncidenteService $service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $incidentes = $this->service->getAll($request);
        $tipoIncidentes = TipoIncidente::orderBy('tipo')->get();
        $tipoRiesgos = TipoRiesgo::orderBy('tipo')->get();
        $nivelRiesgos = NivelRiesgo::orderBy('nivel')->get();
        
        return view('incidentes.index', compact(
            'incidentes', 
            'tipoIncidentes', 
            'tipoRiesgos', 
            'nivelRiesgos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::orderBy('tipo_establecimiento')->orderBy('nivel')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $tipoIncidentes = TipoIncidente::orderBy('tipo')->get();
        $tipoRiesgos = TipoRiesgo::orderBy('tipo')->get();
        $nivelRiesgos = NivelRiesgo::orderBy('nivel')->get();
        $materialEquipos = MaterialEquipo::orderBy('nombre')->get();
        
        return view('incidentes.form', [
            'incidente' => new Incidente(),
            'areas' => $areas,
            'responsables' => $responsables,
            'tipoIncidentes' => $tipoIncidentes,
            'tipoRiesgos' => $tipoRiesgos,
            'nivelRiesgos' => $nivelRiesgos,
            'materialEquipos' => $materialEquipos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncidenteRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('incidentes.index')->with('message', 'Incidente creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $incidente = $this->service->find($id);
            return view('incidentes.show', compact('incidente'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('incidentes.index')->with('error', 'Incidente no encontrado');
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        try {
            $incidente = $this->service->find($id);
            
            $areas = Area::orderBy('tipo_establecimiento')->orderBy('nivel')->get();
            $responsables = Responsable::orderBy('nombre')->get();
            $tipoIncidentes = TipoIncidente::orderBy('tipo')->get();
            $tipoRiesgos = TipoRiesgo::orderBy('tipo')->get();
            $nivelRiesgos = NivelRiesgo::orderBy('nivel')->get();
            $materialEquipos = MaterialEquipo::orderBy('nombre')->get();
            
            return view('incidentes.form', compact(
                'incidente', 
                'areas', 
                'responsables', 
                'tipoIncidentes', 
                'tipoRiesgos', 
                'nivelRiesgos', 
                'materialEquipos'
            ));
            
        } catch (ModelNotFoundException $e) {
            return redirect()->route('incidentes.index')->with('error', 'Incidente no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncidenteRequest $request, int $id)
    {
        try {
            $incidente = $this->service->find($id);
            $this->service->update($incidente, $request->validated());
            return redirect()->route('incidentes.index')->with('message', 'Incidente actualizado exitosamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('incidentes.index')->with('error', 'Incidente no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->service->delete($id);
            return redirect()->route('incidentes.index')->with('message', 'Incidente eliminado exitosamente');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('incidentes.index')->with('error', 'Incidente no encontrado');
        }
    }
}