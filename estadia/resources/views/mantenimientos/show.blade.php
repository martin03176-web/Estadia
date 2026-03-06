@extends('layouts.template')
@section('titulo','Reporte de mantenimiento')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            REPORTE DE MANTENIMIENTO
        </div>

        <div class="card-body">

            <p><strong>Extintor:</strong> {{ $mantenimiento->extintor->codigo ?? 'N/A' }}</p>
            <p><strong>Responsable:</strong> {{ $mantenimiento->responsable->nombre ?? 'N/A' }}</p>
            <p><strong>Fecha:</strong> {{ $mantenimiento->fecha }}</p>
            <p><strong>Tipo de mantenimiento:</strong> {{ $mantenimiento->tipo }}</p>
            <p><strong>Observaciones:</strong></p>

            <div class="border p-2">
                {{ $mantenimiento->observaciones }}
            </div>

        </div>
    </div>

</div>

@endsection