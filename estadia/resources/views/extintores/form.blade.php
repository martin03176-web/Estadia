@extends('layouts.template')

@section('estilos')
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-group label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: block;
    }
    .required:after {
        content: " *";
        color: red;
    }
</style>
@endsection

@section('titulo', $extintor->exists ? 'Editar Extintor' : 'Nuevo Extintor')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-M">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">
                
                {{ $extintor->exists ? 'Editar Extintor' : 'Nuevo Extintor' }}
            </h1>
            <a href="{{ route('extintores.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ $extintor->exists ? route('extintores.update', $extintor->id) : route('extintores.store') }}" class="login-form">
            @csrf
            @if($extintor->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="required">Clave del Extintor</label>
                <div class="d-flex gap-2">
                    <select class="form-control" name="clave_id" required>
                        <option value="">Seleccione una clave...</option>
                        @foreach($claves as $clave)
                            <option value="{{ $clave->id }}" {{ old('clave_id', $extintor->clave_id) == $clave->id ? 'selected' : '' }}>
                                {{ $clave->clave }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('claves.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                @error('clave_id')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Número / Numeración</label>
                <input type="text" name="numeracion" value="{{ old('numeracion', $extintor->numeracion ?? $extintor->no) }}" 
                       class="form-control" placeholder="Ej: 001, 002, etc." required>
                @error('numeracion')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Fecha de Adquisición</label>
                <input type="date" name="fecha_adquisicion" value="{{ old('fecha_adquisicion', $extintor->fecha_adquisicion) }}" class="form-control" required>
                @error('fecha_adquisicion')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Área</label>
                <div class="d-flex gap-2">
                    <select class="form-control" name="area_id" required>
                        <option value="">Seleccione un área...</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $extintor->area_id) == $area->id ? 'selected' : '' }}>
                                {{ $area->tipo_establecimiento }} - {{ $area->nivel }} - {{ $area->lugar_especifico }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('areas.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                @error('area_id')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Tipo de Extintor</label>
                <div class="d-flex gap-2">
                    <select class="form-control" name="tipo_id" required>
                        <option value="">Seleccione un tipo...</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ old('tipo_id', $extintor->tipo_id) == $tipo->id ? 'selected' : '' }}>
                                {{ $tipo->tipo }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('tipos.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                @error('tipo_id')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Peso (kg)</label>
                <input type="number" step="0.01" min="0" name="peso" value="{{ old('peso', $extintor->peso) }}" 
                       class="form-control" placeholder="Ej: 4.5, 6, 9" required>
                @error('peso')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Ubicación</label>
                <input type="text" name="ubicacion" value="{{ old('ubicacion', $extintor->ubicacion) }}" 
                       class="form-control" placeholder="Ej: Pasillo principal, Esquina norte" required>
                @error('ubicacion')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Lugar de Referencia</label>
                <input type="text" name="lugar_referencia" value="{{ old('lugar_referencia', $extintor->lugar_referencia) }}" 
                       class="form-control" placeholder="Ej: Junto al extintor #001, Cerca de la entrada">
                @error('lugar_referencia')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Condición del Extintor</label>
                <select name="condicion_extintor" class="form-control">
                    <option value="Nuevo" {{ old('condicion_extintor', $extintor->condicion_extintor) == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                    <option value="Usado" {{ old('condicion_extintor', $extintor->condicion_extintor) == 'Usado' ? 'selected' : '' }}>Usado</option>
                    <option value="Mantenimiento" {{ old('condicion_extintor', $extintor->condicion_extintor) == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                    <option value="Dañado" {{ old('condicion_extintor', $extintor->condicion_extintor) == 'Dañado' ? 'selected' : '' }}>Dañado</option>
                </select>
                @error('condicion_extintor')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="3" placeholder="Observaciones adicionales...">{{ old('observaciones', $extintor->observaciones) }}</textarea>
                @error('observaciones')     
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-solid-red w-100">
                    <i class="fa-solid fa-check-to-slot"></i> 
                    {{ $extintor->exists ? 'Actualizar' : 'Registrar' }}
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
    console.log('Formulario de extintores cargado');
</script>
@endsection