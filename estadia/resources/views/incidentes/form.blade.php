@extends('layouts.template')

@section('estilos')
<style>
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        resize: vertical;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
    }

    .form-group textarea:focus {
        outline: none;
        border-color: #7c0000;
        box-shadow: 0 0 0 3px rgba(124, 0, 0, 0.1);
    }

    .form-group textarea:hover {
        border-color: #999;
    }
</style>
@endsection

@section('titulo', 'Registro de Incidencias')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>{{ $incidente->exists ? 'Editar' : 'Nuevo' }} Incidente</h1>
        </div>

        <div class="row">
            <div class="col-md-6 justify-content-center">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $incidente->exists ? route('incidentes.update', $incidente->id) : route('incidentes.store') }}" class="login-form">
            @csrf
            @if($incidente->exists)
                @method('PUT')
            @endif

            <!-- Asunto -->
            <div class="form-group">
                <label><i class="fa-solid fa-envelope"></i> Asunto</label>
                <textarea name="asunto" id="asunto" rows="3" placeholder="Escriba el asunto del incidente..." required>{{ old('asunto', $incidente->asunto) }}</textarea>
                @error('asunto')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Fecha -->
            <div class="form-group">
                <label><i class="fa-regular fa-calendar-days"></i> Fecha</label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $incidente->fecha) }}" required>
                @error('fecha')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Área -->
            <div class="form-group">
                <label><i class="fa-solid fa-building"></i> Área
                    <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3" target="_blank"><i class="fa-solid fa-plus"></i> Nueva Área</a>
                </label>
                <select name="area_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un área...</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id', $incidente->area_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->tipo_establecimiento }} - {{ $area->nivel }} - {{ $area->lugar_especifico }}
                        </option>
                    @endforeach
                </select>
                @error('area_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Responsable -->
            <div class="form-group">
                <label><i class="fa-solid fa-user"></i> Responsable
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3" target="_blank"><i class="fa-solid fa-plus"></i> Nuevo Responsable</a>
                </label>
                <select name="responsable_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_id', $incidente->responsable_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tipo Incidente -->
            <div class="form-group">
                <label><i class="fa-solid fa-triangle-exclamation"></i> Tipo de Incidente
                    <a href="{{ route('tipoIncidentes.create') }}" type="button" class="btn btn-outline-secondary mb-3" target="_blank"><i class="fa-solid fa-plus"></i> Nuevo Tipo</a>
                </label>
                <select name="tipo_incidente_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un tipo...</option>
                    @foreach($tipoIncidentes as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_incidente_id', $incidente->tipo_incidente_id) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_incidente_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tipo Riesgo -->
            <div class="form-group">
                <label><i class="fa-solid fa-chart-line"></i> Tipo de Riesgo
                    <a href="{{ route('tipoRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3" target="_blank"><i class="fa-solid fa-plus"></i> Nuevo Tipo</a>
                </label>
                <select name="tipo_riesgo_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un tipo...</option>
                    @foreach($tipoRiesgos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_riesgo_id', $incidente->tipo_riesgo_id) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_riesgo_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="form-group">
                <label><i class="fa-solid fa-file-lines"></i> Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="5" placeholder="Describa detalladamente lo sucedido..." required>{{ old('descripcion', $incidente->descripcion) }}</textarea>
                @error('descripcion')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Nivel Riesgo -->
            <div class="form-group">
                <label><i class="fa-solid fa-gauge-high"></i> Nivel de Riesgo
                    <a href="{{ route('nivelRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3" target="_blank"><i class="fa-solid fa-plus"></i> Nuevo Nivel</a>
                </label>
                <select name="nivel_riesgo_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un nivel...</option>
                    @foreach($nivelRiesgos as $nivel)
                        <option value="{{ $nivel->id }}" {{ old('nivel_riesgo_id', $incidente->nivel_riesgo_id) == $nivel->id ? 'selected' : '' }}>
                            {{ $nivel->nivel }}
                        </option>
                    @endforeach
                </select>
                @error('nivel_riesgo_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Acciones Correctivas -->
            <div class="form-group">
                <label><i class="fa-solid fa-clipboard-check"></i> Acciones Correctivas</label>
                <textarea name="acciones_correctivas" id="acciones_correctivas" rows="5" placeholder="Describa las acciones correctivas implementadas..." required>{{ old('acciones_correctivas', $incidente->acciones_correctivas) }}</textarea>
                @error('acciones_correctivas')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Material/Equipo -->
            <div class="form-group">
                <label><i class="fa-solid fa-toolbox"></i> Material o Equipo
                    <a href="{{ route('materialEquipos.create') }}" type="button" class="btn btn-outline-secondary mb-3" target="_blank"><i class="fa-solid fa-plus"></i> Nuevo Material</a>
                </label>
                <select name="material_equipo_id" class="form-control form-select-sm" required>
                    <option value="">Seleccione un material...</option>
                    @foreach($materialEquipos as $material)
                        <option value="{{ $material->id }}" {{ old('material_equipo_id', $incidente->material_equipo_id) == $material->id ? 'selected' : '' }}>
                            {{ $material->nombre }} - {{ $material->nota }}
                        </option>
                    @endforeach
                </select>
                @error('material_equipo_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Horas -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fa-regular fa-clock"></i> Hora de inicio</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" 
                            value="{{ old('hora_inicio', $incidente->hora_inicio ? \Carbon\Carbon::parse($incidente->hora_inicio)->format('H:i') : '') }}" 
                            required>
                        @error('hora_inicio')
                            <div class="logo-text"><p>{{ $message }}</p></div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fa-regular fa-clock"></i> Hora de finalización</label>
                        <input type="time" id="hora_fin" name="hora_fin" 
                            value="{{ old('hora_fin', $incidente->hora_fin ? \Carbon\Carbon::parse($incidente->hora_fin)->format('H:i') : '') }}" 
                            required>
                        @error('hora_fin')
                            <div class="logo-text"><p>{{ $message }}</p></div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Botón principal -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $incidente->exists ? 'Actualizar' : 'Registrar' }}
                </button>
            </div>
        </form>

        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    console.log('Formulario cargado correctamente');
</script>
@endsection