@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablas.css')}}">    
@endsection

@section('titulo','Lista de Atenciones')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->

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
            <h1>Lista de Atenciones</h1>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Nombre alumno</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Código</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Signos Vitales</th>
                    <th scope="col">Valoración SAMPLE</th>
                    <th></th>
                  </tr>
                </thead>
                @forEach($atencions as $atencion)
                <tbody>
                  <tr>
                    <th scope="row">{{$atencion->paciente->nombre}}</th>
                    <td>{{$atencion->paciente->edad}}</td>
                    <td>{{$atencion->paciente->codigo}}</td>
                    <td>{{$atencion->paciente->carrera_area}}</td>
                    <td>{{$atencion->paciente->semestre}}</td>
                    <td><ul class="list-group">
                        <li class="list-group-item">FC: {{$atencion->frecuencia_cardiaca}} lpm</li>
                        <li class="list-group-item">FR: {{$atencion->frecuencia_respiratoria}} rpm</li>
                        <li class="list-group-item">T/A: {{$atencion->tension_sistolica}}/{{$atencion->tension_diastolica}}</li>
                        <li class="list-group-item">Temp: {{$atencion->temperatura}}°C</li>
                        <li class="list-group-item">(SpO2): {{$atencion->oxigenacion}}%</li>
                        <li class="list-group-item">Glucemia: {{$atencion->glucemia}} mg/dL</li>
                      </ul></td>
                    <td><ul class="list-group">
                        <li class="list-group-item">S: {{$atencion->signos_sintomas}}</li>
                        <li class="list-group-item">A: {{$atencion->alergias}}</li>
                        <li class="list-group-item">M: {{$atencion->medicamento}}</li>
                        <li class="list-group-item">P: {{$atencion->patologia}}</li>
                        <li class="list-group-item">L: {{$atencion->ultimo_alimento}}</li>
                        <li class="list-group-item">E: {{$atencion->eventos_previos}}</li>
                      </ul></td>
                    <td><a href="{{ route('atencions.edit', $atencion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
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
    });
</script>
    
@endsection
 