@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/registros1.css')}}"> 

@endsection

@section('titulo','Atención de pacientes')


@section('menu')
    <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
    </button>
    
    <nav class="main-nav" id="mainNav">
        <!-- Pacientes -->
        <div class="nav-item">
            <a  class="nav-link" id="pacientesLink">
                <i class="fas fa-user-injured nav-icon"></i>
                <span>Pacientes</span>
            </a>
            <div class="submenu">
                <a href="http://localhost/laravel/estadia/public/atencion_paciente" class="submenu-link">
                    <i class="fa-regular fa-pen-to-square"></i> Atender Paciente
                </a>
                <a href="http://localhost/laravel/estadia/public/lista_pacientes" class="submenu-link">
                    <i class="fas fa-list"></i> Lista de Pacientes
                </a>
                <a href="http://localhost/laravel/estadia/public/lista_atenciones" class="submenu-link">
                    <i class="fas fa-chart-bar"></i> Lista de Atenciones
                </a>
        
            </div>
        </div>
        <!-- Incidencias -->
        <div class="nav-item">
            <a  class="nav-link" id="pacientesLink">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Incidencias</span>
            </a>
            <div class="submenu">
                <a href="http://localhost/laravel/estadia/public/registro_incidencias" class="submenu-link">
                    <i class="fas fa-exclamation-triangle"></i> Reportar Incidencia
                </a>
                <a href="http://localhost/laravel/estadia/public/historial_incidencias" class="submenu-link">
                    <i class="fas fa-history"></i> Historial de Incidencias
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_areas" class="submenu-link">
                    <i class="fa-solid fa-expand"></i> Áreas
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_materiales" class="submenu-link">
                    <i class="fa-solid fa-toolbox"></i> Materiales o Equipos
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_incidentes" class="submenu-link">
                    <i class="fa-solid fa-person-falling-burst"></i> Tipo de Incidente
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_riesgos" class="submenu-link">
                    <i class="fa-solid fa-explosion"></i> Tipo de Riesgo
                </a>
                 <a href="http://localhost/laravel/estadia/public/tabla_niveles" class="submenu-link">
                    <i class="fa-solid fa-skull-crossbones"></i> Nivel de Riesgo
                </a>
            </div>
        </div>
        
        <!-- Fumigaciones -->
        <div class="nav-item">
            <a  class="nav-link" id="fumigacionesLink">
                <i class="fas fa-spray-can nav-icon"></i>
                <span>Fumigaciones</span>
            </a>
            <div class="submenu">
                <a href="http://localhost/laravel/estadia/public/tabla_fumigaciones" class="submenu-link">
                    <i class="fa-solid fa-table"></i> Tabla de Fumigaciones 
                </a>
                <a href="/fumigaciones/historial" class="submenu-link">
                    <i class="fas fa-clipboard-list"></i> Historial
                </a>
                <a href="http://localhost/laravel/estadia/public/lista_responsables" class="submenu-link">
                    <i class="fa-solid fa-person"></i> Reponsables
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_equipos" class="submenu-link">
                    <i class="fa-solid fa-toolbox"></i> Equipos de Fumigación
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_areas" class="submenu-link">
                    <i class="fa-solid fa-cube"></i> Áreas
                </a>
            </div>
        </div>
        
        <!-- Extintores -->
        <div class="nav-item">
            <a  class="nav-link" id="extintoresLink">
                <i class="fas fa-fire-extinguisher nav-icon"></i>
                <span>Extintores</span>
            </a>
            <div class="submenu">
                <a href="http://localhost/laravel/estadia/public/registro_extintores" class="submenu-link">
                    <i class="fa-solid fa-circle-plus"></i> Nuevo Extintor
                </a>
                <a href="http://localhost/laravel/estadia/public/inventario_extintores" class="submenu-link">
                    <i class="fas fa-boxes"></i> Inventario
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_mantenimientos" class="submenu-link">
                    <i class="fas fa-tools"></i> Mantenimiento
                </a>
                <a href="http://localhost/laravel/estadia/public/tabla_areas" class="submenu-link">
                    <i class="fas fa-clipboard-check"></i> Áreas
                </a>
            </div>
        </div>
        <div class="nav-item">
            <div name="trigger">
                <a  class="btn btn-register" id="extintoresLink">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Sesion de {{ Auth::user()->name }}</span>
                </a>
            </div>
            
            <div class="submenu" name="content">
                <a href="http://localhost/laravel/estadia/public/dashboard" class="submenu-link">
                    <i class="fa-regular fa-window-maximize"></i> Inicio
                </a>
                <a :href="route('profile.edit')" class="submenu-link">
                    <i class="fa-solid fa-id-card-clip"></i> {{ __('Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();"
                                class="submenu-link">
                                <i class="fa-solid fa-door-open"></i> {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </nav>


@endsection
 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
 @section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
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

        <form method="POST" action="{{ $atencion->exists ? route('atencions.update', $atencion) : route('atencions.store') }}" class="login-form">
            @csrf
            @if($atencion->exists) @method('PUT') @endif
            <!-- Paciente_id -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person"></i> Paciente
                    <a href="{{ route('pacientes.create') }}" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Paciente Nuevo</a>
                </label>
                
                    <input type="text" id="paciente_input" list="pacientes_list" class="form-control form-control-lg" 
                           placeholder="Ingrese el Nombre Completo..." >
                           {{-- Este es el campo que realmente se enviará --}}
                            <input type="hidden" name="paciente_id" id="paciente_id">
                           
                           <datalist id="pacientes_list" >
                            @foreach($pacientes as $paciente)
                            <option 
                            data-id="{{ $paciente->id }}"
                            value="{{ $paciente->nombre }} - {{ $paciente->codigo }} - {{ $paciente->edad }} - {{ $paciente->carrera_area }} - {{ $paciente->semestre }}">
                        </option>
                    @endforeach
                           </datalist>
                           @error('paciente_id')     
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
                <input type="text" id="frecuencia_cardiaca" name="frecuencia_cardiaca" value="{{ old('frecuencia_cardiaca', $atencion->frecuencia_cardiaca) }}"
                       placeholder="Descripción..." required autofocus autocomplete="frecuencia_cardiaca">
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
                <input type="text" id="frecuencia_respiratoria" name="frecuencia_respiratoria" value="{{ old('frecuencia_respiratoria', $atencion->frecuencia_respiratoria) }}"
                       placeholder="Descripción..." required autofocus autocomplete="frecuencia_respiratoria">
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
                <input type="text" id="tension_sistolica" name="tension_sistolica" value="{{ old('tension_sistolica', $atencion->tension_sistolica) }}"
                       placeholder="Descripción..." required autofocus autocomplete="tension_sistolica">
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
                <input type="text" id="tension_diastolica" name="tension_diastolica" value="{{ old('tension_diastolica', $atencion->tension_diastolica) }}"
                       placeholder="Descripción..." required autofocus autocomplete="tension_diastolica">
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
                <input type="text" id="temperatura" name="temperatura" value="{{ old('temperatura', $atencion->temperatura) }}"
                       placeholder="Descripción..." required autofocus autocomplete="temperatura">
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
                <input type="text" id="oxigenacion" name="oxigenacion" value="{{ old('oxigenacion', $atencion->oxigenacion) }}"
                       placeholder="Descripción..." required autofocus autocomplete="oxigenacion">
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
                <input type="text" id="glucemia" name="glucemia" value="{{ old('glucemia', $atencion->glucemia) }}"
                       placeholder="Descripción..." required autofocus autocomplete="glucemia">
                       @error('glucemia')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>glucemia
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
                    <i class="fa-solid fa-head-side-cough"></i> Alergias
                </label>
                <input type="text" id="alergias" name="alergias" value="{{ old('alergias', $atencion->alergias) }}"
                       placeholder="Descripción..." required autofocus autocomplete="alergias">
                       @error('alergias')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- medicamentos -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-capsules"></i> Medicamentos
                </label>
                <input type="text" id="medicamento" name="medicamento" value="{{ old('medicamento', $atencion->medicamento) }}"
                       placeholder="Descripción..." required autofocus autocomplete="medicamento">
                       @error('medicamento')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- patologia -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-utensils"></i> Patologia
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
                    <i class="fa-solid fa-utensils"></i> Último Alimento
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
                    <i class="fa-solid fa-calendar-day"></i> Eventos Previos
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
                <input type="text" id="destino" name="destino" value="{{ old('destino', $atencion->destino) }}"
                       placeholder="Escriba el destino" required autofocus autocomplete="destino">
                       @error('destino')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
            <!-- Boton principal -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $atencion->exists ? 'Actualizar' : 'Registrar'}}
                </x-primary-button>
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menú móvil
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
        
        // Cerrar menú al hacer clic en un enlace
        const navLinks = document.querySelectorAll('.nav-link, .submenu-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 900) {
                    mainNav.classList.remove('active');
                    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        });
        document.getElementById('paciente_input').addEventListener('input', function () {

let input = this.value;
let options = document.querySelectorAll('#pacientes_list option');
let hidden = document.getElementById('paciente_id');

hidden.value = '';

options.forEach(option => {

    if(option.value === input){
        hidden.value = option.dataset.id;
    }

});

});
    });
</script>
    
@endsection
 