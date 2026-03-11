@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Programar fumigaciones')


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Programar Fumigaciones</h1>
        </div>
        <div class="row ">
            <div class="col-md-6 justify-content-center" >
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-login" date-bs-dismiss="alert" ariel-label="Cerrar"></button>
                    
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $fumigacion->exists ? route('fumigaciones.update', $fumigacion) :route('fumigaciones.store') }}" class="login-form">
            @csrf

             <!-- Responsables del servicio -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person"></i> Responsable del Servicio
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="responsble_servicio_id" id="responsble_servicio_id" required
                                value="{{ old('responsble_servicio_id', $fumigacion->responsble_servicio_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('responsble_servicio_id')     
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
                       value="{{ $fumigacion->exists && $fumigacion->area ? $fumigacion->area->edificio . ' - ' . $fumigacion->area->piso . ' - ' . $fumigacion->area->lugar : old('area_text', '') }}"
                       placeholder="Seleccione o busque un área...">
                
                <input type="hidden" name="area_id" id="area_id" required
                       value="{{ old('area_id', $fumigacion->area_id) }}">
                
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
                    <i class="fa-solid fa-person"></i> Responsable Titular
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="responsable_titular_id" id="responsable_titular_id" required
                                value="{{ old('responsable_titular_id', $fumigacion->responsable_titular_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('responsable_titular_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>

            <!-- fecha de fumigacion -->
            <div class="form-group">
                <label>
                    <i class="fa-regular fa-calendar-days"></i> Fecha
                </label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $fumigacion->fecha) }}"
                        required autofocus autocomplete="fecha">
                       @error('fecha')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-book"></i> Motivo
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Motivo</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="motivo_id" id="motivo_id" required
                                value="{{ old('motivo_id', $fumigacion->motivo_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('motivo_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person"></i> Responsable Ante Contingencia
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="responsable_contingencia_id" id="responsable_contingencia_id" required
                                value="{{ old('responsable_contingencia_id', $fumigacion->responsable_contingencia_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('responsable_contingencia_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-toolbox"></i> Material o Equipo Utilizado para Fumigación
                    <a href="{{ route('equipoFumigaciones.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Material/Equipo</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="equipo_fumigacion_id" id="equipo_fumigacion_id" required
                                value="{{ old('equipo_fumigacion_id', $fumigacion->equipo_fumigacion_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('equipo_fumigacion_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>
            
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person"></i> Responsable de Fumigacion
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsables_input" list="responsables_list" class="form-control form-control-lg" 
                         placeholder="Ingrese el Nombre Completo..." >
                                {{-- Este es el campo que realmente se enviará --}}
                                <input type="hidden" name="responsable_fumigacion_id" id="responsable_fumigacion_id" required
                                value="{{ old('responsable_fumigacion_id', $fumigacion->responsable_fumigacion_id) }}">
                                
                                <datalist id="responsables_list" >
                                @foreach($responsables as $responsable)
                                <option 
                                data-id="{{ $responsable->id }}"
                                value="{{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}">
                            </option>
                        @endforeach
                                </datalist>
                                @error('responsable_fumigacion_id')     
                            <div class="logo-text">
                                <p>{{$message}}</p> 
                            </div>
                                @enderror
                           
            </div>
            
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $fumigacion->exists ? 'Actualizar' : 'Registrar' }}
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
        setupDatalist('tipofumigacions_input', 'tipofumigacions_list', 'tipo_fumigacion_id');
        setupDatalist('tipoRiesgos_input', 'tipoRiesgos_list', 'tipo_riesgo_id');
        setupDatalist('nivelRiesgos_input', 'nivelRiesgos_list', 'nivel_riesgo_id');
        setupDatalist('materialEquipos_input', 'materialEquipos_list', 'material_equipo_id');
    });
</script>
    
@endsection
 