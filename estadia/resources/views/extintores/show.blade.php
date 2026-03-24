@extends('layouts.template')

@section('titulo','Detalles del Extintor')

@section('contenido')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">
                <i class="fa-solid fa-fire-extinguisher"></i> 
                Detalles del Extintor #{{ $extintor->numeracion ?? $extintor->no }}
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong><i class="fa-solid fa-shield"></i> Clave:</strong> 
                        {{ $extintor->clave->clave ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-arrow-up-9-1"></i> Número:</strong> 
                        {{ $extintor->numeracion ?? $extintor->no ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-regular fa-calendar-days"></i> Fecha Adquisición:</strong> 
                        {{ $extintor->fecha ? date('d/m/Y', strtotime($extintor->fecha)) : 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-expand"></i> Área:</strong> 
                        {{ $extintor->area->tipo_establecimiento ?? 'N/A' }} - 
                        {{ $extintor->area->nivel ?? 'N/A' }} - 
                        {{ $extintor->area->lugar_especifico ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-fire-extinguisher"></i> Tipo:</strong> 
                        {{ $extintor->tipo->tipo ?? 'N/A' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong><i class="fa-solid fa-weight-scale"></i> Peso:</strong> 
                        {{ $extintor->peso ?? 'N/A' }} kg
                    </p>
                    <p><strong><i class="fa-solid fa-location-dot"></i> Ubicación:</strong> 
                        {{ $extintor->ubicacion ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-map-pin"></i> Lugar Referencia:</strong> 
                        {{ $extintor->lugar_referencia ?? 'N/A' }}
                    </p>
                    <p><strong><i class="fa-solid fa-calendar-check"></i> Condición:</strong> 
                        @php
                            $condicionClass = '';
                            switch($extintor->condicion) {
                                case 'Nuevo': $condicionClass = 'bg-success'; break;
                                case 'Usado': $condicionClass = 'bg-info'; break;
                                case 'Mantenimiento': $condicionClass = 'bg-warning'; break;
                                case 'Dañado': $condicionClass = 'bg-danger'; break;
                                default: $condicionClass = 'bg-secondary';
                            }
                        @endphp
                        <span class="badge {{ $condicionClass }}">{{ $extintor->condicion ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
            
            @if($extintor->observaciones)
            <div class="mt-3">
                <strong><i class="fa-solid fa-align-left"></i> Observaciones:</strong>
                <div class="border p-3 mt-2 bg-light rounded">
                    {{ $extintor->observaciones }}
                </div>
            </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('extintores.edit', $extintor) }}" class="btn btn-warning">
                    <i class="fa-solid fa-edit"></i> Editar
                </a>
                <a href="{{ route('extintores.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection