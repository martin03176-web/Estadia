@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/registros.css')}}">    
@endsection

@section('titulo','Programar Fumigaciones')

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

        <form method="POST" action="{{ route('register') }}" class="login-form">
            @csrf
             <!-- Name/Nombre -->
             <div class="form-group">
                <label for="responsable_id" :value="__('responsable_id')">
                    <i class="fa-solid fa-person"></i> Responsable del Servicio
                    <a href="http://localhost/laravel/estadia/public/registro_responsables" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsable_id" list="responsable" class="form-control form-control-lg"
                           placeholder="Ingrese Nombre del Responsable" required autofocus autocomplete="responsable_id">
                           <datalist id="responsable" >
                            <option value="Martin">Martin</option>
                            <option value="Jose">Jose</option>
                            <option value="Pedro">Pedro</option>
                            <option value="Pablo">Pablo</option>
                            <option value="Juan">Juan</option>
                            <option value="Maria">Maria</option>
    
                           </datalist>
                           @error('responsable_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>

            <div class="form-group">
                <label for="area_id" :value="__('area_id')">
                    <i class="fa-solid fa-expand"></i> Áreas
                    <a href="http://localhost/laravel/estadia/public/registro_areas" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Área Nueva</a>
                </label>
                    <input type="text" id="area_id" list="area" class="form-control form-control-lg"
                           placeholder="Ingrese el Area" required autofocus autocomplete="area_id">
                           <datalist id="area" >
                            <option value="A"></option>
                            <option value="B"></option>
                            <option value="C"></option>
                            <option value="D"></option>
                           </datalist>
                           @error('area_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           
            </div>

            <div class="form-group">
                <label for="responsable_id" :value="__('responsable_id')">
                    <i class="fa-solid fa-person"></i> Responsable Titular
                    <a href="http://localhost/laravel/estadia/public/registro_responsables" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsable_id" list="responsable" class="form-control form-control-lg"
                           placeholder="Ingrese Nombre del Responsable" required autofocus autocomplete="responsable_id">
                           <datalist id="responsable" >
                            <option value="Martin">Martin</option>
                            <option value="Jose">Jose</option>
                            <option value="Pedro">Pedro</option>
                            <option value="Pablo">Pablo</option>
                            <option value="Juan">Juan</option>
                            <option value="Maria">Maria</option>
    
                           </datalist>
                           @error('responsable_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>

            <!-- Email Address/Correo Electronico -->
            <div class="form-group">
                <label for="number" :value="__('Email')">
                    <i class="fa-regular fa-calendar-days"></i> Fecha
                </label>
                <input type="date" id="email" name="email" :value=" {{ old('email') }}"
                       placeholder="" required autofocus autocomplete="username">
                       @error('email')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label for="name" :value="__('Name')">
                    <i class="fa-solid fa-align-left"></i> Motivo
                </label>
                <textarea name="name" id="name"  rows="5" :value="old('name')"
                class="form-control"></textarea>
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            

            <div class="form-group">
                <label for="responsable_id" :value="__('responsable_id')">
                    <i class="fa-solid fa-person"></i> Responsable Ante Contingencia
                    <a href="http://localhost/laravel/estadia/public/registro_responsables" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsable_id" list="responsable" class="form-control form-control-lg"
                           placeholder="Ingrese el Nombre de Responsable" required autofocus autocomplete="responsable_id">
                           <datalist id="responsable" >
                            <option value="Martin">Martin</option>
                            <option value="Jose">Jose</option>
                            <option value="Pedro">Pedro</option>
                            <option value="Pablo">Pablo</option>
                            <option value="Juan">Juan</option>
                            <option value="Maria">Maria</option>
    
                           </datalist>
                           @error('responsable_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>

            <div class="form-group">
                <label for="material_id" :value="__('material_id')">
                    <i class="fa-solid fa-toolbox"></i> Material o Equipo Utilizado para Fumigación
                    <a href="http://localhost/laravel/estadia/public/registro_material_equipo" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Material o Equipo</a>
                </label>
                    <input type="text" id="material_id" list="material" class="form-control form-control-lg"
                           placeholder="Ingrese el Material o Equipo" >
                           <datalist id="material" >
                            <option value="Mochila"></option>
                            <option value="Otro"></option>
                           </datalist>
                           @error('material_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
            </div>

            <div class="form-group">
                <label for="responsable_id" :value="__('responsable_id')">
                    <i class="fa-solid fa-person"></i> Responsable de Fumigacion
                    <a href="http://localhost/laravel/estadia/public/registro_responsables" type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Responsable</a>
                </label>
                    <input type="text" id="responsable_id" list="responsable" class="form-control form-control-lg"
                           placeholder="Ingrese el Nombre de Responsable" required autofocus autocomplete="responsable_id">
                           <datalist id="responsable" >
                            <option value="Martin">Martin</option>
                            <option value="Jose">Jose</option>
                            <option value="Pedro">Pedro</option>
                            <option value="Pablo">Pablo</option>
                            <option value="Juan">Juan</option>
                            <option value="Maria">Maria</option>
    
                           </datalist>
                           @error('responsable_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <a  class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> Registrar
                </a>
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
    });
</script>
    
@endsection
 