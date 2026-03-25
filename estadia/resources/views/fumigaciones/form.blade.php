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

@section('titulo','Programar fumigación')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-M">
        <h1 style="text-align: center; color: #7c0000; margin-bottom: 30px;">
            {{ $fumigacione->exists ? 'Editar' : 'Nueva' }} Fumigación
        </h1>

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Debug: Ver qué datos tiene $fumigacione (solo para desarrollo) -->
        @if($fumigacione->exists && config('app.debug'))
            <div class="alert alert-info small">
                <strong>Debug:</strong><br>
                ID: {{ $fumigacione->id }}<br>
                Fecha: {{ $fumigacione->fecha }}<br>
                Hora: {{ $fumigacione->hora }}<br>
                Area ID: {{ $fumigacione->area_id }}<br>
                Motivo ID: {{ $fumigacione->motivo_id }}
            </div>
        @endif

        <form method="POST" action="{{ $fumigacione->exists ? route('fumigaciones.update', $fumigacione->id) : route('fumigaciones.store') }}" class="login-form">
            @csrf
            @if($fumigacione->exists) @method('PUT') @endif

            <input type="hidden" name="tipo" value="{{ $tipo }}">

            @if($tipo === 'programada')
                <div class="form-group">
                    <label class="required">Periodo</label>
                    <select name="periodo_id" class="form-control" required>
                        <option value="">Seleccione un periodo...</option>
                        @foreach($periodos as $p)
                            <option value="{{ $p->id }}" {{ old('periodo_id', $fumigacione->periodo_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->anio }} - {{ ucfirst($p->temporada) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="form-group">
                <label class="required">Responsable del Servicio</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="responsble_servicio_id" class="form-control" required>
                        <option value="">Seleccione un responsable...</option>
                        @foreach($responsables as $responsable)
                            <option value="{{ $responsable->id }}" {{ old('responsble_servicio_id', $fumigacione->responsble_servicio_id) == $responsable->id ? 'selected' : '' }}>
                                {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('responsables.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label class="required">Área</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="area_id" class="form-control" required>
                        <option value="">Seleccione un área...</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $fumigacione->area_id) == $area->id ? 'selected' : '' }}>
                                {{ $area->tipo_establecimiento }} - {{ $area->nivel }} - {{ $area->lugar_especifico }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('areas.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label class="required">Responsable Titular</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="responsable_titular_id" class="form-control" required>
                        <option value="">Seleccione un responsable...</option>
                        @foreach($responsables as $responsable)
                            <option value="{{ $responsable->id }}" {{ old('responsable_titular_id', $fumigacione->responsable_titular_id) == $responsable->id ? 'selected' : '' }}>
                                {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('responsables.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label class="required">Fecha</label>
                <input type="date" name="fecha" value="{{ old('fecha', $fumigacione->fecha) }}" required class="form-control">
                @error('fecha')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Hora de fumigación</label>
                <input type="time" name="hora" value="{{ old('hora', $fumigacione->hora) }}" required class="form-control">
                @error('hora')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="required">Motivo</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="motivo_id" class="form-control" required>
                        <option value="">Seleccione un motivo...</option>
                        @foreach($motivos as $motivo)
                            <option value="{{ $motivo->id }}" {{ old('motivo_id', $fumigacione->motivo_id) == $motivo->id ? 'selected' : '' }}>
                                {{ $motivo->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('motivos.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label class="required">Responsable ante Contingencia</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="responsable_contingencia_id" class="form-control" required>
                        <option value="">Seleccione un responsable...</option>
                        @foreach($responsables as $responsable)
                            <option value="{{ $responsable->id }}" {{ old('responsable_contingencia_id', $fumigacione->responsable_contingencia_id) == $responsable->id ? 'selected' : '' }}>
                                {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('responsables.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label class="required">Equipo de Fumigación</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="equipo_fumigacion_id" class="form-control" required>
                        <option value="">Seleccione un equipo...</option>
                        @foreach($equipoFumigaciones as $equipo)
                            <option value="{{ $equipo->id }}" {{ old('equipo_fumigacion_id', $fumigacione->equipo_fumigacion_id) == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('equipoFumigaciones.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label class="required">Responsable de Fumigación</label>
                <div class="d-flex gap-2 mb-2">
                    <select name="responsable_fumigacion_id" class="form-control" required>
                        <option value="">Seleccione un responsable...</option>
                        @foreach($responsables as $responsable)
                            <option value="{{ $responsable->id }}" {{ old('responsable_fumigacion_id', $fumigacione->responsable_fumigacion_id) == $responsable->id ? 'selected' : '' }}>
                                {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('responsables.create') }}" class="btn btn-outline-secondary" target="_blank">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-solid-red w-100">
                    <i class="fa-solid fa-check-to-slot"></i> 
                    {{ $fumigacione->exists ? 'Actualizar' : 'Registrar' }}
                </button>
                <a href="{{ route('fumigaciones.index') }}" class="btn btn-secondary w-100 mt-2">
                    <i class="fa-solid fa-arrow-left"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</section>
@endsection