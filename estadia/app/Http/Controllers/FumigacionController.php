<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fumigacion\FumigacionRequest;
use App\Services\Fumigacion\FumigacionService;
use App\Models\Fumigacion;
use App\Models\Area;
use App\Models\Responsable;
use App\Models\EquipoFumigacion;

class FumigacionController extends Controller
{
    public function __construct(protected FumigacionService $service)
    {}

    public function index()
    {
        $fumigacions = $this->service->getAllOrdenado();
        return view('fumigacions.index', compact('fumigacions'));
    }

    public function create()
    {
        $areas = Area::orderByRaw("FIELD(edificio, 
            'F', 'A', 'F1', 'B', 'F2', 'C', 'F3', 'D', 'F4', 'E', 'F5', 'G', 'H', 'I', 'J', 'Nave')")
            ->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $materialEquipos = EquipoFumigacion::orderBy('nombre')->get();
        
        return view('fumigacions.form', 
            ['fumigacion' => new Fumigacion()], 
            compact('areas', 'responsables', 'materialEquipos')
        ); 
    }

    public function store(FumigacionRequest $request)
    {
        \Log::info('=== NUEVO Fumigacion ===');
        \Log::info('Datos completos:', $request->all());
        \Log::info('Datos validados:', $request->validated());
        
        \Log::info('area_id:', [$request->input('area_id')]);
        \Log::info('responsable_id:', [$request->input('responsable_id')]);
        
        try {
            $fumigacion = $this->service->create($request->validated());
            \Log::info('Fumigacion creado con ID: ' . $fumigacion->id);
            
            return redirect()->route('fumigacions.index')
                ->with('message', 'Fumigacion creada exitosamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear Fumigacion: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Error al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function show($id)
    {
        $fumigacion = Fumigacion::with([
            'area',
            'responsable',
            'equipoFumigacion'
        ])->findOrFail($id);

        return view('fumigacions.show', compact('fumigacion'));
    }

    public function edit(Fumigacion $fumigacion)
    {
        $areas = Area::orderByRaw("FIELD(edificio, 
            'F', 'A', 'F1', 'B', 'F2', 'C', 'F3', 'D', 'F4', 'E', 'F5', 'G', 'H', 'I', 'J', 'Nave')")
            ->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $materialEquipos = EquipoFumigacion::orderBy('nombre')->get();
        
        return view('fumigacions.form', compact('fumigacion', 'areas', 'responsables', 'materialEquipos'));
    }

    public function update(FumigacionRequest $request, Fumigacion $fumigacion)
    {
        $this->service->update($fumigacion, $request->validated());

        return redirect()->route('fumigacions.index')
            ->with('message', 'Fumigacion actualizada exitosamente');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('fumigacions.index')
            ->with('message', 'Fumigacion Eliminada exitosamente');
    }
}