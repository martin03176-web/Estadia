@extends('layouts.template')
@section('estilos')


@endsection

@section('titulo','Atención de pacientes')



 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
 @section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Atención a Pacientes</h1>
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

        <form method="POST" action="{{ $atencion->exists ? route('atenciones.update', $atencion) : route('atenciones.store') }}" class="login-form">
            @csrf
            @if($atencion->exists) 
            @method('PUT') @endif
            <!-- atencion_id -->
            <div class="form-group">

                <div class="form-group">

                    <label>
                        <i class="fa-solid fa-person"></i> Paciente
                        
                        <a href="{{ route('pacientes.create') }}" 
                           class="btn btn-outline-secondary">
                           <i class="fa-solid fa-circle-up"></i> Paciente Nuevo
                        </a>
                    </label>
                
                    <input 
                        type="text" 
                        id="pacientes_input"
                        list="pacientes_list"
                        class="form-control form-control-lg"
                        placeholder="Ingrese el Nombre Completo..."
                        autocomplete="off"
                    >
                
                    {{-- Este es el campo que realmente se enviará --}}
                    <input type="hidden" name="paciente_id" id="paciente_id">
                
                    <datalist id="pacientes_list">
                        @foreach($pacientes as $paciente)
                            <option 
                                data-id="{{ $paciente->id }}"
                                value="{{ $paciente->nombre }} - {{ $paciente->codigo }} - {{ $paciente->carrera_area}}">
                            </option>
                        @endforeach
                    </datalist>
                
                    @error('paciente_id')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                
                </div>
           
             <!-- edad -->
             <div class="form-group">
                <label >
                    <i class="fa-solid fa-calendar"></i> Edad
                </label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $atencion->edad) }}"
                       placeholder="Ingrese la Edad" required autofocus autocomplete="edad" >
                       @error('edad')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
             <!-- Semestre -->
             <div class="form-group">
                <label >
                    <i class="fa-solid fa-business-time"></i> Semestre
                </label>
                <input type="text" id="semestre" name="semestre" value="{{ old('semestre', $atencion->semestre) }}"
                       placeholder="Ingrese el Semestre">
                       @error('semestre')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- hora_atencion -->
            <div class="form-group">
                <label>
                    <i class="fa-regular fa-calendar-days"></i> Hora de Atención 

                </label>
                <input type="text" id="hora_atencion" name="hora_atencion" value="{{ old('hora_atencion', $atencion->hora_atencion) }}"
                       placeholder="Hora de Atención... " required autofocus autocomplete="hora_atencion">
                       @error('hora_atencion')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div><!-- Apartado de Signos vitales -->
            <div class="logo-text">
                <p><i class="fa-solid fa-file-waveform"></i> Signos Vitales</p>
            </div>
             <!-- frecuencia_cardiaca -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-heart-pulse"></i> Frecuencia Cardíaca
                </label>
                <input type="number" step="0.01" min="0" id="frecuencia_cardiaca" name="frecuencia_cardiaca" value="{{ old('frecuencia_cardiaca', $atencion->frecuencia_cardiaca) }}"
                        placeholder="Solo numeros..." required autofocus autocomplete="frecuencia_cardiaca">
                       @error('frecuencia_cardiaca')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
            <!-- frecuencia_respiratoria -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-lungs"></i> Frecuencia Respiratoria
                </label>
                <input type="number" step="0.01" min="0" id="frecuencia_respiratoria" name="frecuencia_respiratoria" value="{{ old('frecuencia_respiratoria', $atencion->frecuencia_respiratoria) }}"
                        placeholder="Solo numeros..." required autofocus autocomplete="frecuencia_respiratoria">
                       @error('frecuencia_respiratoria')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- tension_sistolica -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-up-long"></i> Tensión Sistólica
                </label>
                <input type="number" step="0.01" min="0" id="tension_sistolica" name="tension_sistolica" value="{{ old('tension_sistolica', $atencion->tension_sistolica) }}"
                        placeholder="Solo numeros..." >
                       @error('tension_sistolica')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- tension_diastolica -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-down-long"></i> Tensión Diastólica
                </label>
                <input type="number" step="0.01" min="0" id="tension_diastolica" name="tension_diastolica" value="{{ old('tension_diastolica', $atencion->tension_diastolica) }}"
                       placeholder="Solo numeros..." >
                       @error('tension_diastolica')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- temperatura -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-temperature-low"></i> Temperatura
                </label>
                <input type="number" step="0.01" min="0" id="temperatura" name="temperatura" value="{{ old('temperatura', $atencion->temperatura) }}"
                        placeholder="Solo numeros..." required autofocus autocomplete="temperatura">
                       @error('temperatura')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- oxigenacion -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-arrow-up-wide-short"></i> Oxigenación
                </label>
                <input type="number" step="0.01" min="0" id="oxigenacion" name="oxigenacion" value="{{ old('oxigenacion', $atencion->oxigenacion) }}"
                       placeholder="Solo numeros..." required autofocus autocomplete="oxigenacion">
                       @error('oxigenacion')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- glucemia -->
            <div class="form-group">
                <label >
                    <i class="fa-notdog fa-solid fa-droplet" style="color: #cc0000;"></i> Glucemia
                </label>
                <input type="number" step="0.01" min="0" id="glucemia" name="glucemia" value="{{ old('glucemia', $atencion->glucemia) }}"
                       placeholder="Solo numeros..." required autofocus autocomplete="glucemia">
                       @error('glucemia')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- Apartado de Valoración SAMPLE -->
            <div class="logo-text">
               <p><i class="fa-solid fa-clipboard-user"></i> Valoración SAMPLE</p>
            </div>
            <!-- signos_sintomas -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-file-signature"></i> Signos y Síntomas 
                </label>
                <input type="text" id="signos_sintomas" name="signos_sintomas" value="{{ old('signos_sintomas', $atencion->signos_sintomas) }}"
                       placeholder="Descripción..." required autofocus autocomplete="signos_sintomas">
                       @error('signos_sintomas')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- alergias -->
            
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-head-side-cough"></i> Alergias: No/Si y ¿Cuáles?
                </label>
                <input type="text" id="alergias" name="alergias" value="{{ old('alergias', $atencion->alergias) }}"
                       placeholder=" No, ninguna/Sí, a penicilina..." required autofocus autocomplete="alergias">
                       @error('alergias')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- medicamentos -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-capsules"></i> Medicamentos que toma actualmente, No/Si y ¿Cuáles?
                </label>
                <input type="text" id="medicamento" name="medicamento" value="{{ old('medicamento', $atencion->medicamento) }}"
                       placeholder="No, ninguno/ Sí,..." autocomplete="medicamento">
                       @error('medicamento')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- patologia -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-utensils"></i> Patologías o Antecedentes medicos
                </label>
                <input type="text" id="patologia" name="patologia" value="{{ old('patologia', $atencion->patologia) }}"
                       placeholder="Descripción..." required autofocus autocomplete="patologia">
                       @error('patologia')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- ultimo_alimento -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-utensils"></i> Último Alimento ingerido
                </label>
                <input type="text" id="ultimo_alimento" name="ultimo_alimento" value="{{ old('ultimo_alimento', $atencion->ultimo_alimento) }}"
                       placeholder="Descripción..." required autofocus autocomplete="ultimo_alimento">
                       @error('ultimo_alimento')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- eventos_previos -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-calendar-day"></i> Eventos que ocaciono la atención
                </label>
                <input type="text" id="eventos_previos" name="eventos_previos" value="{{ old('eventos_previos', $atencion->eventos_previos) }}"
                       placeholder="Descripción..." required autofocus autocomplete="eventos_previos">
                       @error('eventos_previos')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- destino -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-location-dot"></i> Destino
                </label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="destino" >
                    <option value="Se retira por sus propios medios" @selected(old('destino', $atencion->destino) === 'Se retira por sus propios medios' )>Se retira por sus propios medios</option>
                    <option value="Acompañado por familiar/amigo" @selected(old('destino', $atencion->destino) === 'Acompañado por familiar/amigo' )>Acompañado por familiar/amigo</option>
                    <option value="Traslado a servicio medico interno" @selected(old('destino', $atencion->destino) === 'Traslado a servicio medico interno' )>Traslado a servicio medico interno</option>
                    <option value="Traslado en ambulancia" @selected(old('destino', $atencion->destino) === 'Traslado en ambulancia' )>Traslado en ambulancia</option>
                    <option value="Traslado a la unidad de cuidados" @selected(old('destino', $atencion->destino) === 'Traslado a la unidad de cuidados' )>Traslado a la unidad de cuidados</option>
                  </select>
                       @error('destino')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
            <!-- Boton principal -->
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
        setupDatalist('pacientes_input', 'pacientes_list', 'paciente_id');
    });
</script>
@endsection