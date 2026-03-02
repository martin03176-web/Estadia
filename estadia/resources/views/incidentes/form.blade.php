@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">
@endsection

@section('titulo','Reporte de incidencias')

@section('contenido')
<section class="hero">
    <div class="login-wrapper">
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

            <!-- Asunto -->
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
                <input type="text" id="areas_input" list="areas_list" class="form-control"
                       value="{{ $incidente->exists && $incidente->area ? $incidente->area->edificio . ' - ' . $incidente->area->piso . ' - ' . $incidente->area->lugar : old('area_text', '') }}"
                       placeholder="Seleccione o busque un área...">
                <input type="hidden" name="area_id" id="area_id" required value="{{ old('area_id', $incidente->area_id) }}">
                <datalist id="areas_list">
                    @foreach($areas as $area)
                    <option data-id="{{ $area->id }}" value="{{ $area->edificio }} - {{ $area->piso }} - {{ $area->lugar }}"></option>
                    @endforeach
                </datalist>
                @error('area_id')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Responsable -->
            <div class="form-group">
                <label><i class="fa-solid fa-person"></i> Responsable que Reporta
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
        
                <input type="text" id="responsables_input" list="responsables_list" class="form-control"
                       value="{{ $incidente->exists && $incidente->responsable ? $incidente->responsable->nombre . ' - ' . $incidente->responsable->telefono . ' - ' . $incidente->responsable->puesto_area : old('responsable_text', '') }}"
                       placeholder="Seleccione el responsable">
                <input type="hidden" name="responsable_id" id="responsable_id" required value="{{ old('responsable_id', $incidente->responsable_id) }}">
                
                
                <datalist id="responsables_list">
                    @foreach($responsables as $responsable)
                    <option data-id="{{ $responsable->id }}" value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}"></option>
                    @endforeach
                </datalist>
                @error('responsable_id')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Tipo Incidente -->
            <div class="form-group">
                <label><i class="fa-solid fa-person-falling-burst"></i> Tipo de Incidente
                    <a href="{{ route('tipoIncidentes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Tipo</a>
                </label>
            
                <input type="text" id="tipoIncidentes_input" list="tipoIncidentes_list" class="form-control"
                       value="{{ $incidente->exists && $incidente->tipoIncidente ? $incidente->tipoIncidente->tipo : old('tipoIncidente_text', '') }}"
                       placeholder="Seleccione el tipo...">
                <input type="hidden" name="tipo_incidente_id" id="tipo_incidente_id" required value="{{ old('tipo_incidente_id', $incidente->tipo_incidente_id) }}">

                <datalist id="tipoIncidentes_list">
                    @foreach($tipoIncidentes as $tipoIncidente)
                    <option data-id="{{ $tipoIncidente->id }}" value="{{ $tipoIncidente->tipo }}"></option>
                    @endforeach
                </datalist>
                @error('tipo_incidente_id')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

            <!-- Tipo Riesgo -->
            <div class="form-group">
                <label><i class="fa-solid fa-explosion"></i> Tipo de Riesgo
                    <a href="{{ route('tipoRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Tipo</a>
                </label>

                <input type="text" id="tipoRiesgos_input" list="tipoRiesgos_list" class="form-control"
                       value="{{ $incidente->exists && $incidente->tipoRiesgo ? $incidente->tipoRiesgo->tipo : old('tipoIncidente_text', '') }}"
                       placeholder="Seleccione el tipo...">
                <input type="hidden" name="tipo_riesgo_id" id="tipo_riesgo_id" required value="{{ old('tipo_riesgo_id', $incidente->tipo_riesgo_id) }}">


                <datalist id="tipoRiesgos_list">
                    @foreach($tipoRiesgos as $tipoRiesgo)
                    <option data-id="{{ $tipoRiesgo->id }}" value="{{ $tipoRiesgo->tipo }}"></option>
                    @endforeach
                </datalist>
                @error('tipo_riesgo_id')
                <div class="logo-text"><p>{{$message}}</p></div>
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

                <input type="text" id="tipoRiesgos_input" list="tipoRiesgos_list" class="form-control"
                       value="{{ $incidente->exists && $incidente->nivelRiesgo ? $incidente->nivelRiesgo->nivel : old('nivelRiesgo_text', '') }}"
                       placeholder="Ingrese el Nivel...">
                <input type="hidden" name="nivel_riesgo_id" id="nivel_riesgo_id" required value="{{ old('nivel_riesgo_id', $incidente->nivel_riesgo_id) }}">
                
                <datalist id="nivelRiesgos_list">
                    @foreach($nivelRiesgos as $nivelRiesgo)
                    <option data-id="{{ $nivelRiesgo->id }}" value="{{ $nivelRiesgo->nivel }}"></option>
                    @endforeach
                </datalist>
                @error('nivel_riesgo_id')
                <div class="logo-text"><p>{{$message}}</p></div>
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
                
                <input type="text" id="materialEquipos_input" list="materialEquipos_list" class="form-control"
                       value="{{ $incidente->exists && $incidente->materialEquipo ? $incidente->materialEquipo->nombre : old('nivelRiesgo_text', '') }}"
                       placeholder="Ingrese el Material utilizado...">
                <input type="hidden" name="material_equipo_id" id="material_equipo_id" required value="{{ old('material_equipo_id', $incidente->nivel_riesgo_id) }}">
            
                <datalist id="materialEquipos_list">
                    @foreach($materialEquipos as $materialEquipo)
                    <option data-id="{{ $materialEquipo->id }}" value="{{ $materialEquipo->nombre }} - {{ $materialEquipo->nota }}"></option>
                    @endforeach
                </datalist>
                @error('material_equipo_id')
                <div class="logo-text"><p>{{$message}}</p></div>
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
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $incidente->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function setupDatalist(inputId, listId, hiddenId) {
        const input = document.getElementById(inputId);
        const hidden = document.getElementById(hiddenId);

        if (!input || !hidden) return;

        input.addEventListener('input', function() {
            const options = document.querySelectorAll(`#${listId} option`);
            let found = false;

            options.forEach(option => {
                if (option.value === this.value) {
                    hidden.value = option.dataset.id;
                    found = true;
                }
            });

            if (!found) {
                hidden.value = '';
            }
        });

        input.addEventListener('change', function() {
            const options = document.querySelectorAll(`#${listId} option`);

            options.forEach(option => {
                if (option.value === this.value) {
                    hidden.value = option.dataset.id;
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        setupDatalist('areas_input', 'areas_list', 'area_id');
        setupDatalist('responsables_input', 'responsables_list', 'responsable_id');
        setupDatalist('tipoIncidentes_input', 'tipoIncidentes_list', 'tipo_incidente_id');
        setupDatalist('tipoRiesgos_input', 'tipoRiesgos_list', 'tipo_riesgo_id');
        setupDatalist('nivelRiesgos_input', 'nivelRiesgos_list', 'nivel_riesgo_id');
        setupDatalist('materialEquipos_input', 'materialEquipos_list', 'material_equipo_id');
    });
</script>
@endsection