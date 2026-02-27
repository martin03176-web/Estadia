@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
@endsection

@section('titulo','Inicio')

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
 