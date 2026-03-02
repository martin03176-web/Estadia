<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Extintor\CreateExtintorRequest;
use App\Http\Requests\Extintor\UpdateExtintorRequest;
use App\Services\Extintor\ExtintorService;

use App\Models\Extintor;
use App\Models\Area;
use App\Models\Responsable;
use App\Models\MaterialEquipo;
use App\Models\TipoExtintor;
use App\Models\TipoRiesgo;
use App\Models\NivelRiesgo;


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
        
        $Extintors = $this->service->getAll();
        return view('Extintors.index', compact('Extintors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::orderBy('edificio')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $tipoExtintors = TipoExtintor::orderBy('tipo')->get();
        $tipoRiesgos = TipoRiesgo::orderBy('tipo')->get();
        $nivelRiesgos = NivelRiesgo::orderBy('nivel')->get();
        $materialEquipos = MaterialEquipo::orderBy('nombre')->get();
        return view('Extintors.form', ['Extintor'=> new Extintor()] , compact('areas','responsables','tipoExtintors','tipoRiesgos','nivelRiesgos','materialEquipos')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExtintorRequest $request)
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
            $Extintor = $this->service->create($request->validated());
            \Log::info('Extintor creado con ID: ' . $Extintor->id);
            
            return redirect()->route('Extintors.index')
                ->with('message', 'Atención creada exitosamente');
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
    public function show(int $id)
    {
        $Extintors = $this->service->find($id);
        
        return view('Extintors.show', compact('Extintor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extintor $Extintor)
    {
        
        $Extintors = Extintor::orderBy('nombre')->get();
        return view('Extintors.form', compact('Extintor', 'Extintors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtintorRequest $request, Extintor $Extintor)
    {
        $this->service->update($Extintor, $request->validated());

        return redirect()->route('Extintors.index')->with('message', 'Atención actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('Extintors.index')->with('message', 'Atención Eliminado exitosamente');
    }
}
