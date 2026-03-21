@extends('layouts.template')

@section('titulo', 'Detalles del Periodo')

@section('contenido')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">
                <i class="fa-solid fa-calendar-alt"></i> 
                Periodo: {{ $periodo->nombre }}
            </h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong><i class="fa-solid fa-calendar"></i> Año:</strong> {{ $periodo->anio }}</p>
                    <p><strong><i class="fa-solid fa-leaf"></i> Temporada:</strong> {{ $periodo->temporada_nombre }}</p>
                    <p><strong><i class="fa-solid fa-calendar-week"></i> Fecha Inicio:</strong> {{ $periodo->fecha_inicio ? date('d/m/Y', strtotime($periodo->fecha_inicio)) : 'No definida' }}</p>
                    <p><strong><i class="fa-solid fa-calendar-week"></i> Fecha Fin:</strong> {{ $periodo->fecha_fin ? date('d/m/Y', strtotime($periodo->fecha_fin)) : 'No definida' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong><i class="fa-solid fa-flag-checkered"></i> Estado:</strong> 
                        @if($periodo->activo)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-secondary">Inactivo</span>
                        @endif
                    </p>
                    <p><strong><i class="fa-solid fa-chart-line"></i> Total Fumigaciones:</strong> 
                        <span class="badge bg-primary">{{ $periodo->fumigaciones->count() }}</span>
                    </p>
                    @if($periodo->descripcion)
                        <p><strong><i class="fa-solid fa-align-left"></i> Descripción:</strong><br>{{ $periodo->descripcion }}</p>
                    @endif
                </div>
            </div>

            <h5 class="mt-4">Fumigaciones del Periodo</h5>
            
            @if($periodo->fumigaciones->isEmpty())
                <div class="alert alert-warning">
                    <i class="fa-solid fa-exclamation-triangle"></i> 
                    No hay fumigaciones generadas para este periodo.
                    <a href="{{ route('fumigaciones.periodos.generar', $periodo) }}" class="btn btn-primary btn-sm ms-3">
                        <i class="fa-solid fa-cogs"></i> Generar Fumigaciones
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Área</th>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Responsable</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($periodo->fumigaciones as $fum)
                            <tr>
                                <td>{{ $fum->area->tipo_establecimiento ?? 'N/A' }} - {{ $fum->area->nivel ?? 'N/A' }}</td>
                                <td>{{ date('d/m/Y', strtotime($fum->fecha)) }}</td>
                                <td>{{ $fum->horario ?? 'N/A' }}</td>
                                <td>{{ $fum->responsableServicio->nombre ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('fumigaciones.show', $fum) }}" class="btn btn-info btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('fumigaciones.edit', $fum) }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('fumigaciones.periodos.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
                @if($periodo->fumigaciones->isEmpty())
                    <a href="{{ route('fumigaciones.periodos.generar', $periodo) }}" class="btn btn-primary" onclick="return confirm('¿Generar fumigaciones para este periodo?')">
                        <i class="fa-solid fa-cogs"></i> Generar Fumigaciones
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection