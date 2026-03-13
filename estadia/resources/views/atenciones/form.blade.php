@extends('layouts.template')
@section('estilos')
@endsection

@section('titulo', 'Atención de pacientes')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Atención a Pacientes</h1>
        </div>

        <div class="row">
            <div class="col-md-6 justify-content-center">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $atencion->exists ? route('atenciones.update', $atencion) : route('atenciones.store') }}" class="login-form">
            @csrf
            @if($atencion->exists)
                @method('PUT')
            @endif

            <!-- Paciente -->
            <div class="form-group">
                <label><i class="fa-solid fa-person"></i> Paciente
                    <a href="{{ route('pacientes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Paciente</a>
                </label>
                <select class="form-control form-select-sm" name="paciente_id" required>
                    <option value="">Seleccione un paciente...</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ old('paciente_id', $atencion->paciente_id) == $paciente->id ? 'selected' : '' }}>
                            {{ $paciente->nombre }} - {{ $paciente->codigo }} - {{ $paciente->carrera_area }}
                        </option>
                    @endforeach
                </select>
                @error('paciente_id')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Edad -->
            <div class="form-group">
                <label><i class="fa-solid fa-calendar"></i> Edad</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $atencion->edad) }}"
                       placeholder="Ingrese la Edad" required autofocus autocomplete="edad">
                @error('edad')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Semestre -->
            <div class="form-group">
                <label><i class="fa-solid fa-business-time"></i> Semestre</label>
                <input type="text" id="semestre" name="semestre" value="{{ old('semestre', $atencion->semestre) }}"
                       placeholder="Ingrese el Semestre">
                @error('semestre')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Hora de Atención -->
            <div class="form-group">
                <label><i class="fa-regular fa-calendar-days"></i> Fecha y Hora de Atención</label>
                <input type="datetime-local" id="fecha_atencion" name="fecha_atencion" value="{{ old('fecha_atencion', $atencion->fecha_atencion) }}"
                       placeholder="Fecha de Atención..." required class="form-control" >
                @error('fecha_atencion')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Signos Vitales -->
            <div class="logo-text">
                <p><i class="fa-solid fa-file-waveform"></i> Signos Vitales</p>
            </div>

            <!-- Frecuencia Cardíaca -->
            <div class="form-group">
                <label><i class="fa-solid fa-heart-pulse"></i> Frecuencia Cardíaca</label>
                <input type="number" step="0.01" min="0" id="frecuencia_cardiaca" name="frecuencia_cardiaca"
                       value="{{ old('frecuencia_cardiaca', $atencion->frecuencia_cardiaca) }}"
                       placeholder="Solo números..." required autofocus autocomplete="frecuencia_cardiaca">
                @error('frecuencia_cardiaca')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Frecuencia Respiratoria -->
            <div class="form-group">
                <label><i class="fa-solid fa-lungs"></i> Frecuencia Respiratoria</label>
                <input type="number" step="0.01" min="0" id="frecuencia_respiratoria" name="frecuencia_respiratoria"
                       value="{{ old('frecuencia_respiratoria', $atencion->frecuencia_respiratoria) }}"
                       placeholder="Solo números..." required autofocus autocomplete="frecuencia_respiratoria">
                @error('frecuencia_respiratoria')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tensión Sistólica -->
            <div class="form-group">
                <label><i class="fa-solid fa-up-long"></i> Tensión Sistólica</label>
                <input type="number" step="0.01" min="0" id="tension_sistolica" name="tension_sistolica"
                       value="{{ old('tension_sistolica', $atencion->tension_sistolica) }}"
                       placeholder="Solo números...">
                @error('tension_sistolica')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Tensión Diastólica -->
            <div class="form-group">
                <label><i class="fa-solid fa-down-long"></i> Tensión Diastólica</label>
                <input type="number" step="0.01" min="0" id="tension_diastolica" name="tension_diastolica"
                       value="{{ old('tension_diastolica', $atencion->tension_diastolica) }}"
                       placeholder="Solo números...">
                @error('tension_diastolica')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Temperatura -->
            <div class="form-group">
                <label><i class="fa-solid fa-temperature-low"></i> Temperatura</label>
                <input type="number" step="0.01" min="0" id="temperatura" name="temperatura"
                       value="{{ old('temperatura', $atencion->temperatura) }}"
                       placeholder="Solo números..." required autofocus autocomplete="temperatura">
                @error('temperatura')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Oxigenación -->
            <div class="form-group">
                <label><i class="fa-solid fa-arrow-up-wide-short"></i> Oxigenación</label>
                <input type="number" step="0.01" min="0" id="oxigenacion" name="oxigenacion"
                       value="{{ old('oxigenacion', $atencion->oxigenacion) }}"
                       placeholder="Solo números..." required autofocus autocomplete="oxigenacion">
                @error('oxigenacion')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Glucemia -->
            <div class="form-group">
                <label><i class="fa-solid fa-droplet" style="color: #cc0000;"></i> Glucemia</label>
                <input type="number" step="0.01" min="0" id="glucemia" name="glucemia"
                       value="{{ old('glucemia', $atencion->glucemia) }}"
                       placeholder="Solo números..." required autofocus autocomplete="glucemia">
                @error('glucemia')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Valoración SAMPLE -->
            <div class="logo-text">
                <p><i class="fa-solid fa-clipboard-user"></i> Valoración SAMPLE</p>
            </div>

            <!-- Signos y Síntomas -->
            <div class="form-group">
                <label><i class="fa-solid fa-file-signature"></i> Signos y Síntomas</label>
                <textarea name="signos_sintomas" class="form-control" id="signos_sintomas" rows="2">{{ old('signos_sintomas', $atencion->signos_sintomas) }}</textarea>
                @error('signos_sintomas')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Alergias -->
            <div class="form-group">
                <label><i class="fa-solid fa-head-side-cough"></i> Alergias: No/Si y ¿Cuáles?</label>
                <textarea name="alergias" class="form-control" id="alergias" rows="2">{{ old('alergias', $atencion->alergias) }}</textarea>
                @error('alergias')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Medicamentos -->
            <div class="form-group">
                <label><i class="fa-solid fa-capsules"></i> Medicamentos que toma actualmente, No/Si y ¿Cuáles?</label>
                <textarea name="medicamento" class="form-control" id="medicamento" rows="2">{{ old('medicamento', $atencion->medicamento) }}</textarea>
                @error('medicamento')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Patologías -->
            <div class="form-group">
                <label><i class="fa-solid fa-utensils"></i> Patologías o Antecedentes médicos</label>
                <textarea name="patologia" class="form-control" id="patologia" rows="2">{{ old('patologia', $atencion->patologia) }}</textarea>
                @error('patologia')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Último alimento -->
            <div class="form-group">
                <label><i class="fa-solid fa-utensils"></i> Último Alimento ingerido</label>
                <textarea name="ultimo_alimento" class="form-control" id="ultimo_alimento" rows="2">{{ old('ultimo_alimento', $atencion->ultimo_alimento) }}</textarea>
                @error('ultimo_alimento')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Eventos previos -->
            <div class="form-group">
                <label><i class="fa-solid fa-calendar-day"></i> Eventos que ocasionaron la atención</label>
                <textarea name="eventos_previos" class="form-control" id="eventos_previos" rows="2">{{ old('eventos_previos', $atencion->eventos_previos) }}</textarea>
                @error('eventos_previos')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Destino -->
            <div class="form-group">
                <label><i class="fa-solid fa-location-dot"></i> Destino</label>
                <select class="form-control form-select-sm" name="destino" required>
                    <option value="Se retira por sus propios medios" {{ old('destino', $atencion->destino) == 'Se retira por sus propios medios' ? 'selected' : '' }}>Se retira por sus propios medios</option>
                    <option value="Acompañado por familiar/amigo" {{ old('destino', $atencion->destino) == 'Acompañado por familiar/amigo' ? 'selected' : '' }}>Acompañado por familiar/amigo</option>
                    <option value="Traslado a servicio medico interno" {{ old('destino', $atencion->destino) == 'Traslado a servicio medico interno' ? 'selected' : '' }}>Traslado a servicio medico interno</option>
                    <option value="Traslado en ambulancia" {{ old('destino', $atencion->destino) == 'Traslado en ambulancia' ? 'selected' : '' }}>Traslado en ambulancia</option>
                    <option value="Traslado a la unidad de cuidados" {{ old('destino', $atencion->destino) == 'Traslado a la unidad de cuidados' ? 'selected' : '' }}>Traslado a la unidad de cuidados</option>
                </select>
                @error('destino')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>

            <!-- Botón principal -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $atencion->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>

        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')
@endsection