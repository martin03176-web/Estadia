@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Registro de responsables')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Registro de Responsables</h1>
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

        <form method="POST" action="{{ $responsable->exists ? route('responsables.update', $responsable) :route('responsables.store') }}" class="login-form">
            @csrf
            @if($responsable->exists) @method('PUT') @endif
             <!-- Nombre -->
            <div class="form-group">
                <label >
                    <i class="fas fa-user"></i> Nombre Completo
                </label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $responsable->nombre) }}"
                       placeholder="Ingrese el Nombre del Responsable " required autofocus autocomplete="nombre">
                       @error('nombre')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- telefono -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-square-phone"></i> Teléfono
                </label>
                <input type="number" id="telefono" name="telefono" value="{{ old('telefono', $responsable->telefono) }}"
                       placeholder="Ingrese Número Telefónico" required autofocus autocomplete="telefono">
                       @error('telefono')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- Puesto o area -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-fingerprint"></i> Puesto o Áreas
                </label>
                <input type="text" id="puesto_area" name="puesto_area" value="{{ old('puesto_area', $responsable->puesto_area) }}"
                       placeholder="Ingrese el Puesto o Área" required autofocus autocomplete="puesto_area">
                       @error('puesto_area')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- Nota -->
            <div class="form-group">
                <label >
                    <i class="fa-regular fa-note-sticky"></i> Nota
                </label>
                <input type="text" id="nota" name="nota" value="{{ old('nota', $responsable->nota) }}" 
                       placeholder="..." >
                       @error('nota')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $responsable->exists ? 'Actualizar' : 'Registrar'}}
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
    });
</script>
    
@endsection
 