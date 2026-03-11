@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Reporte de incidencias')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Incidencias</h1>
        </div>
        <div class="row">
            <div class="col-md-6 justify-content-center">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $incidente->exists ? route('incidentes.update', $incidente) : route('incidentes.store') }}" class="login-form">
            @csrf
            @if($incidente->exists)
            @method('PUT')
            @endif

            <!-- Asunto -->|
            <div class="form-group">
                <label><i class="fa-solid fa-align-left"></i> Asunto</label>
                <textarea name="asunto" class="form-control" rows="4">{{ old('asunto', $incidente->asunto) }}</textarea>
                @error('asunto')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Fecha -->
            <div class="form-group">
                <label><i class="fa-regular fa-calendar-days"></i> Fecha</label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $incidente->fecha) }}" required autofocus autocomplete="fecha">
                @error('fecha')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Área -->
            <div class="form-group">
                <label><i class="fa-solid fa-expand"></i> Áreas
                    <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nueva Área</a>
                </label>
                <select class="form-control form-select-sm" name="area_id" required>
                    <option value="">Seleccione un área...</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id', $incidente->area_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->edificio }} - {{ $area->piso }} - {{ $area->lugar }}
                        </option>
                    @endforeach
                </select>
                @error('area_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Responsable -->
            <div class="form-group">
                <label><i class="fa-solid fa-person"></i> Responsable que Reporta
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                <select name="responsable_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_id', $incidente->responsable_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tipo Incidente -->
            <div class="form-group">
                <label><i class="fa-solid fa-person-falling-burst"></i> Tipo de Incidente
                    <a href="{{ route('tipoIncidentes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Tipo</a>
                </label>
                <select name="tipo_incidente_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un tipo...</option>
                    @foreach($tipoIncidentes as $tipoIncidente)
                        <option value="{{ $tipoIncidente->id }}" {{ old('tipo_incidente_id', $incidente->tipo_incidente_id) == $tipoIncidente->id ? 'selected' : '' }}>
                            {{ $tipoIncidente->tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_incidente_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tipo Riesgo -->
            <div class="form-group">
                <label><i class="fa-solid fa-explosion"></i> Tipo de Riesgo
                    <a href="{{ route('tipoRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Tipo</a>
                </label>
                <select name="tipo_riesgo_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un tipo...</option>
                    @foreach($tipoRiesgos as $tipoRiesgo)
                        <option value="{{ $tipoRiesgo->id }}" {{ old('tipo_riesgo_id', $incidente->tipo_riesgo_id) == $tipoRiesgo->id ? 'selected' : '' }}>
                            {{ $tipoRiesgo->tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_riesgo_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="form-group">
                <label><i class="fa-solid fa-align-left"></i> Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="5" class="form-control">{{ old('descripcion', $incidente->descripcion) }}</textarea>
                @error('descripcion')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Nivel Riesgo -->
            <div class="form-group">
                <label><i class="fa-solid fa-skull-crossbones"></i> Nivel de Riesgo
                    <a href="{{ route('nivelRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Nivel</a>
                </label>
                <select name="nivel_riesgo_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un nivel...</option>
                    @foreach($nivelRiesgos as $nivelRiesgo)
                        <option value="{{ $nivelRiesgo->id }}" {{ old('nivel_riesgo_id', $incidente->nivel_riesgo_id) == $nivelRiesgo->id ? 'selected' : '' }}>
                            {{ $nivelRiesgo->nivel }}
                        </option>
                    @endforeach
                </select>
                @error('nivel_riesgo_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Acciones Correctivas -->
            <div class="form-group">
                <label><i class="fa-solid fa-align-left"></i> Acciones Correctivas</label>
                <textarea name="acciones_correctivas" id="acciones_correctivas" rows="5" class="form-control">{{ old('acciones_correctivas', $incidente->acciones_correctivas) }}</textarea>
                @error('acciones_correctivas')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Material/Equipo -->
            <div class="form-group">
                <label><i class="fa-solid fa-toolbox"></i> Material o Equipo Utilizado
                    <a href="{{ route('materialEquipos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Material/Equipo</a>
                </label>
                <select name="material_equipo_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un material/equipo...</option>
                    @foreach($materialEquipos as $materialEquipo)
                        <option value="{{ $materialEquipo->id }}" {{ old('material_equipo_id', $incidente->material_equipo_id) == $materialEquipo->id ? 'selected' : '' }}>
                            {{ $materialEquipo->nombre }} - {{ $materialEquipo->nota }}
                        </option>
                    @endforeach
                </select>
                @error('material_equipo_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tiempo Total -->
            <div class="form-group">
                <label><i class="fa-solid fa-clock-rotate-left"></i> Tiempo Total de Atención</label>
                <input type="text" id="tiempo_total" name="tiempo_total" value="{{ old('tiempo_total', $incidente->tiempo_total) }}"
                       placeholder="..." required autofocus autocomplete="tiempo_total">
                @error('tiempo_total')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $incidente->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')

@endsection