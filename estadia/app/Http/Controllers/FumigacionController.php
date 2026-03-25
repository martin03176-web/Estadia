<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fumigacion\FumigacionRequest;
use App\Models\Area;
use App\Models\EquipoFumigacion;
use App\Models\Fumigacion;
use App\Models\FumigacionPeriodo;
use App\Models\Motivo;
use App\Models\Responsable;
use App\Services\Fumigacion\FumigacionService;
use Illuminate\Http\Request;

class FumigacionController extends Controller
{
    public function __construct(protected FumigacionService $service)
    {}

    public function index()
{
    $periodos = FumigacionPeriodo::with('fumigaciones.area')->get();
    $extemporaneas = Fumigacion::where('tipo', 'extemporanea')
        ->with(['area', 'equipoFumigacion', 'motivo'])
        ->get();

    // Debug: Verifica que los IDs existen
    foreach($periodos as $periodo) {
        foreach($periodo->fumigaciones as $fum) {
            \Log::info('Fumigación ID: ' . $fum->id);
        }
    }
    
    foreach($extemporaneas as $fum) {
        \Log::info('Extemporánea ID: ' . $fum->id);
    }

    return view('fumigaciones.index', compact('periodos', 'extemporaneas'));
}

    public function create(Request $request)
    {
        $tipo = $request->get('tipo', 'programada');
        $periodos = $this->service->obtenerPeriodosDisponibles();
        
        $areas = Area::orderBy('tipo_establecimiento')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $motivos = Motivo::orderBy('descripcion')->get();
        $equipoFumigaciones = EquipoFumigacion::orderBy('nombre')->get();
        
        $fumigacion = new Fumigacion();

        return view('fumigaciones.form', compact(
            'tipo', 
            'periodos', 
            'areas', 
            'responsables', 
            'motivos', 
            'equipoFumigaciones',
            'fumigacion'
        ));
    }

    public function store(FumigacionRequest $request)
    {
        $data = $request->validated();
        
        $data['tipo'] = $data['tipo'] ?? Fumigacion::TIPO_PROGRAMADA;
        
        $this->service->create($data);

        return redirect()->route('fumigaciones.index')
            ->with('message', 'Fumigación creada exitosamente');
    }

    public function show($id)
    {
        $fumigacion = Fumigacion::with([
            'area',
            'responsableServicio',
            'responsableTitular',
            'responsableContingencia',
            'responsableFumigacion',
            'equipoFumigacion',
            'motivo',
            'periodo'
        ])->findOrFail($id);

        return view('fumigaciones.show', compact('fumigacion'));
    }

    public function edit(Fumigacion $fumigacione)  
    {
        
        $tipo = $fumigacione->tipo;
        $periodos = FumigacionPeriodo::all();
        $areas = Area::orderBy('tipo_establecimiento')->get();
        $responsables = Responsable::orderBy('nombre')->get();
        $motivos = Motivo::orderBy('descripcion')->get();
        $equipoFumigaciones = EquipoFumigacion::orderBy('nombre')->get();
        
        return view('fumigaciones.form', compact(
            'fumigacione',  
            'tipo',
            'periodos',
            'areas',
            'responsables',
            'motivos',
            'equipoFumigaciones'
        ));
    }

    public function update(FumigacionRequest $request, Fumigacion $fumigacione)
    {
        \Log::info('Actualizando fumigación ID: ' . $fumigacione->id);
        \Log::info('Datos recibidos: ', $request->validated());
        
        $this->service->update($fumigacione, $request->validated());

        return redirect()->route('fumigaciones.index')
            ->with('message', 'Fumigación actualizada exitosamente');
    }

    public function destroy(Fumigacion $fumigacion)
    {
        $this->service->delete($fumigacion->id);

        return redirect()->route('fumigaciones.index')
            ->with('message', 'Fumigación eliminada exitosamente');
    }

    public function generarPeriodo(Request $request)
    {
        $request->validate([
            'anio' => 'required|integer',
            'temporada' => 'required|in:primavera,verano,otono,invierno'
        ]);

        $this->service->crearPeriodo(
            $request->anio,
            $request->temporada
        );

        return redirect()->route('fumigaciones.index')
            ->with('message', 'Periodo generado correctamente');
    }
}