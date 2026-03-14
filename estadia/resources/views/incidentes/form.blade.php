@extends('layouts.template')

@section('estilos')
<style>
    /* Estilos mínimos necesarios */
    .form-container {
        max-width: 800px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #000000;  /* CAMBIADO A NEGRO */
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #7c0000;
    }

    .btn-submit {
        background: #7c0000;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: #5e0000;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
@endsection

@section('titulo', 'Registro de Incidencias')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-M">
        <h1 style="text-align: center; color: #7c0000; margin-bottom: 30px;">
            {{ $incidente->exists ? 'Editar' : 'Nuevo' }} Incidente
        </h1>
    
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    
        <form method="POST" action="{{ $incidente->exists ? route('incidentes.update', $incidente->id) : route('incidentes.store') }}">
            @csrf
            @if($incidente->exists)
                @method('PUT')
            @endif
    
            <!-- Asunto -->
            <div class="form-group">
                <label>Asunto</label>
                <textarea name="asunto" rows="3" required>{{ old('asunto', $incidente->asunto) }}</textarea>
                @error('asunto') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Fecha -->
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha" value="{{ old('fecha', $incidente->fecha) }}" required>
                @error('fecha') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Área -->
            <div class="form-group">
                <label>Área</label>
                <select name="area_id" required>
                    <option value="">Seleccione un área...</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id', $incidente->area_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->tipo_establecimiento }} - {{ $area->nivel }} - {{ $area->lugar_especifico }}
                        </option>
                    @endforeach
                </select>
                @error('area_id') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Responsable -->
            <div class="form-group">
                <label>Responsable</label>
                <select name="responsable_id" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_id', $incidente->responsable_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_id') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Tipo Incidente -->
            <div class="form-group">
                <label>Tipo de Incidente</label>
                <select name="tipo_incidente_id" required>
                    <option value="">Seleccione un tipo...</option>
                    @foreach($tipoIncidentes as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_incidente_id', $incidente->tipo_incidente_id) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_incidente_id') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Tipo Riesgo -->
            <div class="form-group">
                <label>Tipo de Riesgo</label>
                <select name="tipo_riesgo_id" required>
                    <option value="">Seleccione un tipo...</option>
                    @foreach($tipoRiesgos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_riesgo_id', $incidente->tipo_riesgo_id) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_riesgo_id') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Descripción -->
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" rows="5" required>{{ old('descripcion', $incidente->descripcion) }}</textarea>
                @error('descripcion') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Nivel Riesgo -->
            <div class="form-group">
                <label>Nivel de Riesgo</label>
                <select name="nivel_riesgo_id" required>
                    <option value="">Seleccione un nivel...</option>
                    @foreach($nivelRiesgos as $nivel)
                        <option value="{{ $nivel->id }}" {{ old('nivel_riesgo_id', $incidente->nivel_riesgo_id) == $nivel->id ? 'selected' : '' }}>
                            {{ $nivel->nivel }}
                        </option>
                    @endforeach
                </select>
                @error('nivel_riesgo_id') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Acciones Correctivas -->
            <div class="form-group">
                <label>Acciones Correctivas</label>
                <textarea name="acciones_correctivas" rows="5" required>{{ old('acciones_correctivas', $incidente->acciones_correctivas) }}</textarea>
                @error('acciones_correctivas') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Material/Equipo -->
            <div class="form-group">
                <label>Material o Equipo</label>
                <select name="material_equipo_id" required>
                    <option value="">Seleccione un material...</option>
                    @foreach($materialEquipos as $material)
                        <option value="{{ $material->id }}" {{ old('material_equipo_id', $incidente->material_equipo_id) == $material->id ? 'selected' : '' }}>
                            {{ $material->nombre }} - {{ $material->nota }}
                        </option>
                    @endforeach
                </select>
                @error('material_equipo_id') <div class="error">{{ $message }}</div> @enderror
            </div>
    
            <!-- Horas -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label>Hora de inicio</label>
                    <input 
                        type="time" 
                        name="hora_inicio" 
                        value="{{ old('hora_inicio', $incidente->hora_inicio ? \Carbon\Carbon::parse($incidente->hora_inicio)->format('H:i') : '') }}" 
                        required
                    >
                    @error('hora_inicio') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Hora de finalización</label>
                    <input 
                        type="time" 
                        name="hora_fin" 
                        value="{{ old('hora_fin', $incidente->hora_fin ? \Carbon\Carbon::parse($incidente->hora_fin)->format('H:i') : '') }}" 
                        required
                    >
                    @error('hora_fin') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>
    
            <!-- Botón submit -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $incidente->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
    </div>
</section>

@endsection

@section('scripts')
<script>
    console.log('Formulario cargado correctamente');
</script>
@endsection