@extends('layouts.template')
@section('titulo','Reporte de fumigación')

@section('contenido')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">REPORTE DE FUMIGACIÓN</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong><i class="fa-solid fa-building"></i> Área:</strong> 
                        {{ $fumigacion->area->tipo_establecimiento ?? 'N/A' }} - 
                        {{ $fumigacion->area->nivel ?? 'N/A' }} - 
                        {{ $fumigacion->area->lugar_especifico ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-user"></i> Responsable del Servicio:</strong> 
                        {{ $fumigacion->responsableServicio->nombre ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-user-tie"></i> Responsable Titular:</strong> 
                        {{ $fumigacion->responsableTitular->nombre ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-calendar"></i> Fecha:</strong> 
                        {{ \Carbon\Carbon::parse($fumigacion->fecha)->format('d/m/Y') }}
                    </p>
                    <p><strong><i class="fa-solid fa-clock"></i> Horario:</strong> 
                        {{ $fumigacion->horario ?? 'N/A' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong><i class="fa-solid fa-book"></i> Motivo:</strong> 
                        {{ $fumigacion->motivo->descripcion ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-user-shield"></i> Responsable Contingencia:</strong> 
                        {{ $fumigacion->responsableContingencia->nombre ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-toolbox"></i> Equipo utilizado:</strong> 
                        {{ $fumigacion->equipoFumigacion->nombre ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-user"></i> Responsable Fumigación:</strong> 
                        {{ $fumigacion->responsableFumigacion->nombre ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-tag"></i> Tipo:</strong>
                        @if($fumigacion->tipo == 'programada')
                            <span class="badge bg-success">Programada</span>
                        @else
                            <span class="badge bg-danger">Extemporánea</span>
                        @endif
                    </p>
                </div>
            </div>
            
            @if($fumigacion->observaciones)
            <div class="mt-3">
                <strong><i class="fa-solid fa-comment"></i> Observaciones:</strong>
                <div class="border p-3 mt-2 bg-light rounded">
                    {{ $fumigacion->observaciones }}
                </div>
            </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('fumigaciones.edit', $fumigacion) }}" class="btn btn-warning">
                    <i class="fa-solid fa-edit"></i> Editar
                </a>
                <a href="{{ route('fumigaciones.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection