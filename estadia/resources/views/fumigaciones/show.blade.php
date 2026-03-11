@extends('layouts.template')
@section('titulo','Reporte de fumigación')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            REPORTE DE FUMIGACIÓN
        </div>

        <div class="card-body">

            <p><strong>Área:</strong> {{ $fumigacion->area->edificio ?? 'N/A' }} -- {{ $fumigacion->area->piso ?? 'N/A' }} -- {{ $fumigacion->area->lugar ?? 'N/A' }}</p>
            <p><strong>Responsable:</strong> {{ $fumigacion->responsable->nombre ?? 'N/A' }}</p>
            <p><strong>Equipo utilizado:</strong> {{ $fumigacion->equipoFumigacion->nombre ?? 'N/A' }}</p>
            <p><strong>Fecha:</strong> {{ $fumigacion->fecha }}</p>
            <p><strong>Observaciones:</strong></p>
            <div class="border p-2">
                {{ $fumigacion->observaciones }}
            </div>

        </div>
    </div>

</div>

@endsection