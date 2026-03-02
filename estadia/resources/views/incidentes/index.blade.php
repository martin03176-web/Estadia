@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaL.css')}}">
@endsection

@section('titulo','Historial de Incidencias')

@section('contenido')
<section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Historial de Incidencias</h1>
        </div>

        <div class="container-fluid mt-4 px-4">
            <div class="row">
                @foreach($incidentes as $incidente)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-black d-flex justify-content-between">
                            <strong>{{ $incidente->asunto }}</strong>
                            @php
                                $color = match($incidente->nivelRiesgo->nivel ?? '') {
                                    'Bajo' => 'success',
                                    'Medio' => 'warning',
                                    'Alto' => 'danger',
                                    default => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $color }}">{{ $incidente->nivelRiesgo->nivel ?? 'N/A' }}</span>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <p><strong>Fecha:</strong> {{ $incidente->fecha }}</p>
                                    <p><strong>Área:</strong><br>
                                        {{ $incidente->area->edificio ?? 'N/A' }} <br>
                                        {{ $incidente->area->piso ?? 'N/A' }} <br>
                                        {{ $incidente->area->lugar ?? 'N/A' }}
                                    </p>
                                </div>

                                <div class="col-md-9">
                                    <p><strong>Tipo:</strong> {{ $incidente->tipoIncidente->tipo ?? 'N/A' }}</p>
                                    <p><strong>Riesgo:</strong> {{ $incidente->tipoRiesgo->tipo ?? 'N/A' }}</p>
                                    <hr>
                                    <p class="text-muted">{{ \Str::limit($incidente->descripcion, 1000) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-outline-secondary">
                                Actualizar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 justify-content-center">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
            </div>
        </div>

        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')
@endsection