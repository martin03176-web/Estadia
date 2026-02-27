@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Reporte de incidencias')


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Registro de Incidencias</h1>
        </div>
        <div class="row ">
            <div class="col-md-6 justify-content-center" >
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $incidente->exists ? route('incidentes.update', $incidente) :route('incidentes.store') }}" class="login-form">
            @csrf
            @if($incidente->exists)
            @method('PUT')
            @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-align-left"></i> Asunto
                </label>
                <textarea name="asunto" class="form-control" rows="4">{{ old('asunto', $incidente->asunto) }}</textarea>
                       @error('asunto')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- Email Address/Correo Electronico -->
            <div class="form-group">
                <label>
                    <i class="fa-regular fa-calendar-days"></i> Fecha
                </label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $incidente->fecha) }}"
                        required autofocus autocomplete="fecha">
                       @error('fecha')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-expand"></i> Áreas
                    <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nueva Área</a>
                </label>
                <input type="text" id="areas_input" list="areas_list" class="form-control" 
                       value="{{ $incidente->exists && $incidente->area ? $incidente->area->edificio . ' - ' . $incidente->area->piso . ' - ' . $incidente->area->lugar : old('area_text', '') }}"
                       placeholder="Seleccione o busque un área...">
                
                <input type="hidden" name="area_id" id="area_id" required
                       value="{{ old('area_id', $incidente->area_id) }}">
                
                       <datalist id="areas_list">
                        @foreach($areas as $area)
                        <option data-id="{{ $area->id }}"
                                value="{{ $area->edificio }} - {{ $area->piso }} - {{ $area->lugar }}">
                        </option>
                        @endforeach
                    </datalist>
                @error('area_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person"></i> Responsable que Reporta
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="responsable_id" id="responsable_id" required
                                value="{{ old('responsable_id', $incidente->responsable_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('responsable_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person-falling-burst"></i> Tipo de Incidente
                    <a href="{{ route('tipoIncidentes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Tipo</a>
                </label>
                    <input type="text" id="tipoIncidentes_input" list="tipoIncidentes_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Tipo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="tipo_incidente_id" id="tipo_incidente_id" required
                                value="{{ old('tipo_incidente_id', $incidente->tipo_incidente_id) }}">

                                <datalist id="tipoIncidentes_list" >
                                @foreach($tipoIncidentes as $tipoIncidente)
                                <option 
                                data-id="{{ $tipoIncidente->id }}"
                                value="{{ $tipoIncidente->tipo }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('tipo_incidente_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>
            
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-explosion"></i> Tipo de Riesgo
                    <a href="{{ route('tipoRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Tipo</a>
                </label>
                    <input type="text" id="tipoRiesgos_input" list="tipoRiesgos_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Tipo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="tipo_riesgo_id" id="tipo_riesgo_id" required
                                value="{{ old('tipo_riesgo_id', $incidente->tipo_riesgo_id) }}">
                                
                                
                                <datalist id="tipoRiesgos_list" >
                                @foreach($tipoRiesgos as $tipoRiesgo)
                                <option 
                                data-id="{{ $tipoRiesgo->id }}"
                                value="{{ $tipoRiesgo->tipo }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('tipo_riesgo_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>
             
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-align-left"></i> Descripción
                </label>
                <textarea name="descripcion" id="descripcion" rows="5"
                          class="form-control">{{ old('descripcion', $incidente->descripcion) }}</textarea>
                @error('descripcion')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-skull-crossbones"></i> Nivel de Riesgo
                    <a href="{{ route('nivelRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Nivel</a>
                </label>
                    <input type="text" id="nivelRiesgos_input" list="nivelRiesgos_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nivel..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="nivel_riesgo_id" id="nivel_riesgo_id" required
                                value="{{ old('nivel_riesgo_id', $incidente->nivel_riesgo_id) }}">
                                
                                <datalist id="nivelRiesgos_list" >
                                @foreach($nivelRiesgos as $nivelRiesgo)
                                <option 
                                data-id="{{ $nivelRiesgo->id }}"
                                value="{{ $nivelRiesgo->nivel }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('nivel_riesgo_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>

            
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-align-left"></i> Acciones Correctivas
                </label>
                <textarea name="acciones_correctivas" id="acciones_correctivas"  rows="5" 
                class="form-control">{{ old('acciones_correctivas', $incidente->acciones_correctivas) }}</textarea>
                       @error('acciones_correctivas')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-toolbox"></i> Material o Equipo Utilizado
                    <a href="{{ route('materialEquipos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Nivel</a>
                </label>
                    <input type="text" id="materialEquipos_input" list="materialEquipos_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Material utilizado..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="material_equipo_id" id="material_equipo_id" required
                                value="{{ old('material_equipo_id', $incidente->material_equipo_id) }}">
                                
                                <datalist id="materialEquipos_list" >
                                @foreach($materialEquipos as $materialEquipo)
                                <option 
                                data-id="{{ $materialEquipo->id }}"
                                value="{{ $materialEquipo->nombre }} - {{ $materialEquipo->nota}}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('material_equipo_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-clock-rotate-left"></i> Tiempo Total de Atención 
                </label>
                <input type="text" id="tiempo_total" name="tiempo_total" value="{{ old('tiempo_total', $incidente->tiempo_total) }}"
                       placeholder="..." required autofocus autocomplete="tiempo_total">
                       @error('tiempo_total')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $incidente->exists ? 'Actualizar' : 'Registrar'}}
                </x-primary-button>
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}
            </div>
        </form>
        @if(config('app.debug'))
<div style="background: #f0f0f0; padding: 10px; margin-top: 20px;">
    <h4>Datos de depuración:</h4>
    <p>Área seleccionada ID: <span id="debug_area_id"></span></p>
    <p>Responsable ID: <span id="debug_responsable_id"></span></p>
</div>

<script>
    // Actualizar debug cuando cambien los valores
    document.getElementById('areas_input').addEventListener('input', function() {
        document.getElementById('debug_area_id').textContent = document.getElementById('area_id').value;
    });
</script>
@endif
        
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

        // Cuando el usuario escribe o selecciona
        input.addEventListener('input', function() {
            const options = document.querySelectorAll(`#${listId} option`);
            let found = false;
            
            options.forEach(option => {
                if (option.value === this.value) {
                    hidden.value = option.dataset.id;
                    found = true;
                    console.log(`ID encontrado para ${inputId}:`, option.dataset.id);
                }
            });
            
            // Si no hay match exacto, limpiar el hidden
            if (!found) {
                hidden.value = '';
            }
        });

        // Cuando el usuario selecciona con click o teclado
        input.addEventListener('change', function() {
            const options = document.querySelectorAll(`#${listId} option`);
            
            options.forEach(option => {
                if (option.value === this.value) {
                    hidden.value = option.dataset.id;
                    console.log(`ID establecido para ${inputId}:`, option.dataset.id);
                }
            });
        });
    }

    // Inicializar cuando el DOM esté listo
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