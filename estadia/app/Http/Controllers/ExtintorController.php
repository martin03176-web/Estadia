<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Extintor\ExtintorRequest;
use App\Models\Area;
use App\Models\Clave;
use App\Models\Extintor;
use App\Models\MaterialEquipo;
use App\Models\NivelRiesgo;
use App\Models\Responsable;
use App\Models\Tipo;
use App\Models\TipoRiesgo;
use App\Services\Extintor\ExtintorService;


class ExtintorController extends Controller
{
    public function __construct(protected ExtintorService $service)
    {}
    // public function __construct(protected ExtintorService $service2)
    // {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $extintores = $this->service->getAll();
        return view('extintores.index', compact('extintors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::orderBy('edificio')->get();
        $claves = Clave::orderBy('clave')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $tipo = Tipo::orderBy('tipo')->get();
        $tipoRiesgos = TipoRiesgo::orderBy('tipo')->get();
        $nivelRiesgos = NivelRiesgo::orderBy('nivel')->get();
        $materialEquipos = MaterialEquipo::orderBy('nombre')->get();
        return view('extintores.form', ['extintor'=> new Extintor()] , compact('areas','responsables','tipo','tipoRiesgos','nivelRiesgos','materialEquipos','claves')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExtintorRequest $request)
    {
        \Log::info('=== NUEVO Extintor ===');
        \Log::info('Datos completos:', $request->all());
        \Log::info('Datos validados:', $request->validated());
        
        // Verificar específicamente los IDs
        \Log::info('area_id:', [$request->input('area_id')]);
        \Log::info('responsable_id:', [$request->input('responsable_id')]);
        \Log::info('tipo_Extintor_id:', [$request->input('tipo_Extintor_id')]);
        \Log::info('descripcion:', [$request->input('descripcion')]);
        
        try {
            $extintor = $this->service->create($request->validated());
            \Log::info('Extintor creado con ID: ' . $extintor->id);
            
            return redirect()->route('extintores.index')
                ->with('message', 'Extintor creado exitosamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear Extintor: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Error al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $extintor = Extintor::with([
            'area'
        ])->findOrFail($id);

        return view('extintores.show', compact('extintor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extintor $extintor)
    {
        
        $extintors = Extintor::orderBy('nombre')->get();
        return view('extintores.form', compact('extintor', 'extintors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExtintorRequest $request, Extintor $extintor)
    {
        $this->service->update($extintor, $request->validated());
        return redirect()->route('extintors.index')->with('message', 'Extintor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('extintors.index')->with('message', 'Extintor Eliminado exitosamente');
    }
}
