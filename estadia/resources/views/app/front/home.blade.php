@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/style2.css')}}">    
@endsection

@section('titulo','Inicio')

@section('botones')
<div class="auth-buttons">
    <a href="in" class="btn btn-login">
        <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
    </a>
    <a href="/register" class="btn btn-register">
        <i class="fas fa-user-plus"></i> Usuario
    </a>
</div>
@endsection
@section('menu')
<button class="mobile-menu-btn" id="mobileMenuBtn">
    <i class="fas fa-bars"></i>
</button>

<nav class="main-nav" id="mainNav">
    <!-- Pacientes/Incidencias -->
    <div class="nav-item">
        <a href="/pacientes" class="nav-link" id="pacientesLink">
            <i class="fas fa-user-injured nav-icon"></i>
            <span>Pacientes/Incidencias</span>
        </a>
        <div class="submenu">
            <a href="/pacientes/registro" class="submenu-link">
                <i class="fas fa-plus-circle"></i> Registrar Paciente
            </a>
            <a href="/pacientes/registro" class="submenu-link">
                <i class="fas fa-chart-bar"></i> Atender Paciente
            </a>
    
            <a href="/pacientes/lista" class="submenu-link">
                <i class="fas fa-list"></i> Lista de Pacientes
            </a>
            <a href="/incidencias/registro" class="submenu-link">
                <i class="fas fa-exclamation-triangle"></i> Reportar Incidencia
            </a>
            <a href="/incidencias/historial" class="submenu-link">
                <i class="fas fa-history"></i> Historial de Incidencias
            </a>
        </div>
    </div>
    
    <!-- Fumigaciones -->
    <div class="nav-item">
        <a href="/fumigaciones" class="nav-link" id="fumigacionesLink">
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
    </div>
    
    <!-- Extintores -->
    <div class="nav-item">
        <a href="/extintores" class="nav-link" id="extintoresLink">
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
    </div>
</nav>
@endsection
@section('contenido')


 <!-- Hero Section -->
 <section class="hero">
    <div class="container">
        <h2>Bienvenido</h2>
        <p>Cómo te encuentras el día de hoy.</p>
        
        <div class="hero-buttons">
            
            <a href="/register" class="btn btn-register btn-hero">lo más interesante. </a>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    
@endsection
 