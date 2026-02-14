@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/sesiones.css')}}">    
@endsection

@section('titulo','Registro de Usuario')
@section('menu')
    <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
    </button>
    
    <nav class="main-nav" id="mainNav">
        <!-- Pacientes -->
        <!-- <div class="nav-item">
            <a  class="nav-link" id="pacientesLink">
                <i class="fas fa-user-injured nav-icon"></i>
                <span>Pacientes</span>
            </a>
            <div class="submenu">
                <a href="http://localhost/laravel/estadia/public/atencion_paciente" class="submenu-link">
                    <i class="fas fa-chart-bar"></i> Atender Paciente
                </a>
                <a href="/pacientes/lista" class="submenu-link">
                    <i class="fas fa-list"></i> Lista de Pacientes
                </a>
                <a href="/pacientes/registro" class="submenu-link">
                    <i class="fas fa-chart-bar"></i> Lista de Atenciones
                </a>
        
            </div>
        </div> -->
        <!-- Incidencias -->
        <!-- <div class="nav-item">
            <a  class="nav-link" id="pacientesLink">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Incidencias</span>
            </a>
            <div class="submenu">
                <a href="http://localhost/laravel/estadia/public/registro_incidencias" class="submenu-link">
                    <i class="fas fa-exclamation-triangle"></i> Reportar Incidencia
                </a>
                <a href="/incidencias/historial" class="submenu-link">
                    <i class="fas fa-history"></i> Historial de Incidencias
                </a>
            </div>
        </div> -->
        
        <!-- Fumigaciones -->
        <!-- <div class="nav-item">
            <a  class="nav-link" id="fumigacionesLink">
                <i class="fas fa-spray-can nav-icon"></i>
                <span>Fumigaciones</span>
            </a>
            <div class="submenu">
                <a href="/fumigaciones/programar" class="submenu-link">
                    <i class="fas fa-calendar-plus"></i> Programar Fumigación
                </a>
                <a href="/fumigaciones/calendario" class="submenu-link">
                    <i class="fas fa-calendar-alt"></i> Calendario
                </a>
                <a href="/fumigaciones/historial" class="submenu-link">
                    <i class="fas fa-clipboard-list"></i> Historial
                </a>
                <a href="/fumigaciones/reportes" class="submenu-link">
                    <i class="fas fa-chart-bar"></i> Reportes
                </a>
            </div>
        </div> -->
        
        <!-- Extintores -->
        <!-- <div class="nav-item">
            <a  class="nav-link" id="extintoresLink">
                <i class="fas fa-fire-extinguisher nav-icon"></i>
                <span>Extintores</span>
            </a>
            <div class="submenu">
                <a href="/extintores/inventario" class="submenu-link">
                    <i class="fas fa-boxes"></i> Inventario
                </a>
                <a href="/extintores/mantenimiento" class="submenu-link">
                    <i class="fas fa-tools"></i> Mantenimiento
                </a>
                <a href="/extintores/recarga" class="submenu-link">
                    <i class="fas fa-sync-alt"></i> Recarga
                </a>
                <a href="/extintores/inspeccion" class="submenu-link">
                    <i class="fas fa-clipboard-check"></i> Inspección
                </a>
            </div>
        </div> -->
          <!-- Sesiones -->
        <!-- <div class="nav-item">
            <div name="trigger">
                <a href="{{ route('login') }}"  class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </a>
            </div>
        </div> -->
        <div class="nav-item">
            <div name="trigger">
                <a href="/laravel/estadia/public/"  class="btn btn-register">
                <i class=""></i> Ir a inicio
                </a>
            </div>
        </div>
    </nav>


@endsection
@section('contenido')
    <section class="hero">
        <div class="login-wrapper">
            <div class="logo-text">
                <h1>Registro de Usuario</h1>
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
                    <label for="name" :value="__('Name')">
                        <i class="fas fa-user"></i> Nombre de Usuario
                    </label>
                    <input type="text" id="name" name="name" :value="old('name')"
                           placeholder="Ingrese su Usuario" required autofocus autocomplete="name">
                           @error('name')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                          
                </div>
                <!-- Email Address/Correo Electronico -->
                <div class="form-group">
                    <label for="email" :value="__('Email')">
                        <i class="fa-solid fa-envelope"></i> Correo Electrónico
                    </label>
                    <input type="email" id="email" name="email" :value=" {{ old('email') }}"
                           placeholder="Ingrese su Correo Electrónico" required autofocus autocomplete="username">
                           @error('email')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                          
                </div>
                <!--  Contraseña/Pass -->
                <div class="form-group">
                    <label for="password" :value="__('Password')">
                        <i class="fas fa-lock"></i> Contraseña
                    </label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password"
                               placeholder="Ingrese su Contraseña" required autocomplete="new-password">

                               @error('password')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                        {{-- <button type="button" id="togglePassword" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button> --}}
                    </div>
                  
                </div>
                <!-- Confirmar Contraseña/password_confirmation -->
                <div class="form-group">
                    <label for="password_confirmation" :value="__('Confirm Password')">
                        <i class="fas fa-lock"></i> Confirmar Contraseña
                    </label>
                    <div class="password-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               placeholder="Repita su Contraseña " required autocomplete="new-password">

                               @error('confirm_password')     
                               <div class="logo-text">
                                   <p>{{$message}}</p> 
                               </div>
                                  @enderror
                        {{-- <button type="button" id="togglePassword" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button> --}}
                    </div>
                  
                </div>
                <!-- Boton de acceso -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                    </x-primary-button>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
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