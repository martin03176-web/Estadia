@extends('layouts.template')

@section('titulo', 'Mi Perfil')

@section('contenido')
<div>
    <div class="container">
        <h1 class="page-title">Mi Perfil</h1>
        <p class="page-subtitle">Administra tu información personal, contraseña y configuración de cuenta</p>
    </div>
</div>

<div class="container main-content">
    <div class="row g-4">
        <!-- Información de perfil -->
        <div class="col-12">
            <div class="content-card">
                <h3 >
                    <i class="fas fa-user me-2"></i>Información de perfil
                </h3>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Actualizar contraseña -->
        <div class="col-12">
            <div class="content-card">
                <h3 >
                    <i class="fas fa-lock me-2"></i>Actualizar contraseña
                </h3>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Eliminar cuenta -->
        <div class="col-12">
            <div class="content-card">
                <h3 class="content-title text-danger">
                    <i class="fas fa-trash-alt me-2"></i>Eliminar cuenta
                </h3>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-ocultar alertas después de 3 segundos
    setTimeout(function() {
        document.querySelectorAll('.alert-auto-hide').forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 3000);
</script>
@endsection