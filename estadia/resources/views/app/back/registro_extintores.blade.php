@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/registros.css')}}">    
@endsection

@section('titulo','Registro de extintores')

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
            <h1>Nuevo Extintor</h1>
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
                <label for="clave_id" :value="__('clave_id')">
                    <i class="fa-solid fa-shield"></i> Clave del Extintor
                    <a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Clave Nueva</a>
                </label>
                    <input type="text" id="clave_id" list="clave" class="form-control form-control-lg"
                           placeholder="Ingrese la Clave" >
                           <datalist id="clave" >
                            <option value="A"></option>
                            <option value="B"></option>
                            <option value="C"></option>
                            <option value="D"></option>
                           </datalist>
                           @error('clave_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           
            </div>
            <div class="form-group">
                <label for="telefono" :value="__('Telefono')">
                    <i class="fa-solid fa-arrow-up-9-1"></i> Numeración
                </label>
                <input type="text" id="telefono" name="telefono" :value=" {{ old('telefono') }}"
                       placeholder="Ingrese Número del Extintor" required autofocus autocomplete="telefono">
                       @error('telefono')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label for="number" :value="__('Email')">
                    <i class="fa-regular fa-calendar-days"></i> Fecha de Adquisición
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
                <label for="ex_id" :value="__('ex_id')">
                    <i class="fa-solid fa-fire-extinguisher"></i> Tipo de Extintor
                    <a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Tipo</a>
                </label>
                    <input type="text" id="ex_id" list="tipo_ex" class="form-control form-control-lg"
                           placeholder="Ingrese el Tipo" >
                           <datalist id="tipo_ex" >
                            <option value="PQS"></option>
                            <option value="HFC"></option>
                            <option value="Halotron"></option>
                           </datalist>
                           @error('ex_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>

            <div class="form-group">
                <label for="telefono" :value="__('Telefono')">
                    <i class="fa-solid fa-weight-scale"></i> Pesos del Extintor
                </label>
                <input type="text" id="telefono" name="telefono" :value=" {{ old('telefono') }}"
                       placeholder="Ingrese el peso (Kg)" required autofocus autocomplete="telefono">
                       @error('telefono')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <!-- Email Address/Correo Electronico -->
           

            <div class="form-group">
                <label for="name" :value="__('Name')">
                    <i class="fa-solid fa-location-dot"></i> Ubicación
                </label>
                <textarea name="name" id="name"  rows="2" :value="old('name')"
                class="form-control"></textarea>
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label for="name" :value="__('Name')">
                    <i class="fa-solid fa-map-pin"></i> Lugar de Referecia
                </label>
                <textarea name="name" id="name"  rows="2" :value="old('name')"
                class="form-control"></textarea>
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            

            <div class="form-group">
                <label for="man_id" :value="__('man_id')">
                    <i class="fa-solid fa-helmet-safety"></i> Tipo de Mantenimiento
                </label>
                    <input type="text" id="man_id" list="tipo_man" class="form-control form-control-lg"
                           placeholder="Ingrese el Tipo" >
                           <datalist id="tipo_man" >
                            <option value="Nuevo">Nuevo</option>
                            <option value="Interno">Interno</option>
                            <option value="Anual">Anual</option>
                            <option value="Otro"></option>
                           </datalist>
                           @error('man_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>
            <div class="form-group">
                <label for="number" :value="__('Email')">
                    <i class="fa-regular fa-calendar-days"></i> Fecha del Mantenimiento
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
                    <i class="fa-solid fa-align-left"></i> Observaciones
                </label>
                <textarea name="name" id="name"  rows="4" :value="old('name')"
                class="form-control"></textarea>
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label for="condicion_id" :value="__('condicion_id')">
                    <i class="fa-solid fa-calendar-check"></i> Condición del Extintor
                    <a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nueva Condición</a>
                </label>
                    <input type="text" id="condicion_id" list="condicion" class="form-control form-control-lg"
                           placeholder="Ingrese la Condición" required autofocus autocomplete="material_equipo_id">
                           <datalist id="condicion" >
                            <option value="Nuevo"></option>
                            <option value="Usado"></option>
                            <option value="Mantenimiento"></option>
                            <option value="Dañado"></option>
                           </datalist>
                           @error('condicion_id')     
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
 