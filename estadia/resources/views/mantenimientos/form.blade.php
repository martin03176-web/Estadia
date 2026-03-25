@extends('layouts.template')
@section('titulo', 'Registro de Mantenimiento')

@section('contenido')
<section class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h1 class="h4 mb-0">Atención de Mantenimiento</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $mantenimiento->exists ? route('mantenimientos.update', $mantenimiento) : route('mantenimientos.store') }}">
                @csrf
                @if($mantenimiento->exists) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-fire-extinguisher"></i> Extintor</label>
                    <select class="form-select @error('extintor_id') is-invalid @enderror" name="extintor_id" required>
                        <option value="">Seleccione un extintor...</option>
                        @foreach($extintores as $extintor)
                            <option value="{{ $extintor->id }}" {{ old('extintor_id', $mantenimiento->extintor_id) == $extintor->id ? 'selected' : '' }}>
                                Código: {{$extintor->clave->clave}}/{{$extintor->numeracion}} 
                            </option>
                        @endforeach
                    </select>
                    @error('extintor_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-calendar"></i> Fecha de Mantenimiento</label>
                    <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" 
                           value="{{ old('fecha', $mantenimiento->fecha ?? date('Y-m-d')) }}" required>
                    @error('fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-tools"></i> Tipo de Mantenimiento</label>
                    <select name="tipo" class="form-select @error('tipo') is-invalid @enderror" required>
                        <option value="Interno" {{ old('tipo', $mantenimiento->tipo) == 'Interno' ? 'selected' : '' }}>Interno</option>
                        <option value="Recarga" {{ old('tipo', $mantenimiento->tipo) == 'Recarga' ? 'selected' : '' }}>Recarga</option>
                        <option value="Reparación" {{ old('tipo', $mantenimiento->tipo) == 'Reparación' ? 'selected' : '' }}>Reparación</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i> {{ $mantenimiento->exists ? 'Actualizar' : 'Registrar' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection