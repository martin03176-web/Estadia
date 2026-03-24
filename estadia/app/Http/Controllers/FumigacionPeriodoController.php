<?php

namespace App\Http\Controllers;

use App\Models\FumigacionPeriodo;
use App\Services\Fumigacion\FumigacionService;
use Illuminate\Http\Request;

class FumigacionPeriodoController extends Controller
{
    protected $fumigacionService;

    public function __construct(FumigacionService $fumigacionService)
    {
        $this->fumigacionService = $fumigacionService;
    }

    public function index()
    {
        $periodos = FumigacionPeriodo::orderBy('anio', 'desc')
            ->orderBy('temporada', 'desc')
            ->paginate(10);
        
        return view('fumigaciones.periodos.index', compact('periodos'));
    }

    public function create()
    {
        return view('fumigaciones.periodos.form', ['periodo' => new FumigacionPeriodo()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'anio' => 'required|integer|min:2020|max:2030',
            'temporada' => 'required|in:primavera,verano,otoño,invierno',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'descripcion' => 'nullable|string|max:500'
        ]);

        // Verificar si ya existe
        $existe = FumigacionPeriodo::where('anio', $request->anio)
            ->where('temporada', $request->temporada)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Ya existe un periodo para el año ' . $request->anio . ' y temporada ' . $request->temporada);
        }

        $periodo = FumigacionPeriodo::create($request->all());

        return redirect()->route('fumigaciones.periodos.index')
            ->with('success', 'Periodo creado exitosamente');
    }

    public function show(FumigacionPeriodo $periodo)
    {
        $periodo->load('fumigaciones.area', 'fumigaciones.responsableServicio');
        return view('fumigaciones.periodos.show', compact('periodo'));
    }

    public function edit(FumigacionPeriodo $periodo)
    {
        return view('fumigaciones.periodos.form', compact('periodo'));
    }

    public function update(Request $request, FumigacionPeriodo $periodo)
    {
        $request->validate([
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'descripcion' => 'nullable|string|max:500',
            'activo' => 'boolean'
        ]);

        $periodo->update($request->all());

        return redirect()->route('fumigaciones.periodos.index')
            ->with('success', 'Periodo actualizado exitosamente');
    }

    public function destroy(FumigacionPeriodo $periodo)
    {
        // Verificar si tiene fumigaciones asociadas
        if ($periodo->fumigaciones()->count() > 0) {
            return back()->with('error', 'No se puede eliminar el periodo porque tiene fumigaciones asociadas');
        }

        $periodo->delete();

        return redirect()->route('fumigaciones.periodos.index')
            ->with('success', 'Periodo eliminado exitosamente');
    }

    public function generarFumigaciones(FumigacionPeriodo $periodo)
    {
        try {
            $this->fumigacionService->crearPeriodoConFumigaciones($periodo);
            
            return redirect()->route('fumigaciones.periodos.show', $periodo)
                ->with('success', 'Fumigaciones generadas exitosamente para el periodo');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al generar fumigaciones: ' . $e->getMessage());
        }
    }
}