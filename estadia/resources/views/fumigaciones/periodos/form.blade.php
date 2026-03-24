@extends('layouts.template')

@section('titulo', $periodo->exists ? 'Editar Periodo' : 'Nuevo Periodo')

@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fa-solid fa-calendar-plus"></i>
                        {{ $periodo->exists ? 'Editar Periodo' : 'Nuevo Periodo' }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ $periodo->exists ? route('fumigaciones.periodos.update', $periodo) : route('fumigaciones.periodos.store') }}">
                        @csrf
                        @if($periodo->exists) @method('PUT') @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Año</label>
                                <input type="number" name="anio" class="form-control @error('anio') is-invalid @enderror" 
                                       value="{{ old('anio', $periodo->anio ?? date('Y')) }}" required
                                       min="2020" max="2030">
                                @error('anio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Temporada</label>
                                <select name="temporada" class="form-control @error('temporada') is-invalid @enderror" required>
                                    <option value="">Seleccione...</option>
                                    <option value="primavera" {{ old('temporada', $periodo->temporada) == 'primavera' ? 'selected' : '' }}>Primavera</option>
                                    <option value="verano" {{ old('temporada', $periodo->temporada) == 'verano' ? 'selected' : '' }}>Verano</option>
                                    <option value="otoño" {{ old('temporada', $periodo->temporada) == 'otoño' ? 'selected' : '' }}>Otoño</option>
                                    <option value="invierno" {{ old('temporada', $periodo->temporada) == 'invierno' ? 'selected' : '' }}>Invierno</option>
                                </select>
                                @error('temporada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" 
                                       value="{{ old('fecha_inicio', $periodo->fecha_inicio ? date('Y-m-d', strtotime($periodo->fecha_inicio)) : '') }}">
                                @error('fecha_inicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Fin</label>
                                <input type="date" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" 
                                       value="{{ old('fecha_fin', $periodo->fecha_fin ? date('Y-m-d', strtotime($periodo->fecha_fin)) : '') }}">
                                @error('fecha_fin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion', $periodo->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($periodo->exists)
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="activo" class="form-check-input" id="activo" 
                                       value="1" {{ old('activo', $periodo->activo) ? 'checked' : '' }}>
                                <label class="form-check-label" for="activo">
                                    Periodo Activo
                                </label>
                            </div>
                        </div>
                        @endif

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save"></i> {{ $periodo->exists ? 'Actualizar' : 'Guardar' }}
                            </button>
                            <a href="{{ route('fumigaciones.periodos.index') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection