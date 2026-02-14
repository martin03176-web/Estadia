@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
@endsection

@section('titulo','Inicio')

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
        <div class="nav-item">
            <div name="trigger">
                <a href="{{ route('login') }}"  class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </a>
            </div>
        </div>
        <div class="nav-item">
            <div name="trigger">
                <a href="{{ route('register') }}"  class="btn btn-register">
                <i class="fas fa-user-plus"></i> Registrarse
                </a>
            </div>
        </div>
    </nav>


@endsection
@section('contenido')


 <!-- Hero Section -->
 <section class="hero">
    <div class="container">
        <h2></h2>
      <h2></h2>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        
        <div class="hero-buttons" ></div>
        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
            </a>
            
            <a href="{{ route('register') }}"  class="btn btn-register">
                <i class="fas fa-user-plus"></i> Registrarse
                </a>
        </div>
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
 