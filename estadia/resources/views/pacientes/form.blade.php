@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Registro de pacientes')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Registro de Paciente</h1>
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

        <form method="POST" action="{{ $paciente->exists ? route('pacientes.update', $paciente) : route('pacientes.store') }}" class="login-form">
            @csrf
            @if ($paciente->exists) @method('PUT') @endif
             <!-- Nombre -->
            <div class="form-group">
                <label >
                    <i class="fas fa-user"></i> Nombre Completo
                </label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}"
                       placeholder="Ingrese Nombre del Paciente" required autofocus autocomplete="nombre">
                       @error('nombre')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
              <!-- Sexo -->
              <div class="form-group">
                <label >
                    <i class="fa-solid fa-venus-mars"></i> Sexo
                </label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="sexo" >
                    <option value="Masculino" @selected(old('sexo', $paciente->sexo) === 'Masculino' )>Masculino</option>
                    <option value="Femenino" @selected(old('sexo', $paciente->sexo) === 'Femenino' )>Femenino</option>
                    <option value="Otro" @selected(old('sexo', $paciente->sexo) === 'Otro' )>Otro</option>
                  </select>
                  @error('sexo')     
                  <div class="logo-text">
                      <p>{{$message}}</p> 
                  </div>
                     @enderror
    
            </div>
           <!-- Telefono -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-square-phone"></i> Teléfono
                </label>
                <input type="number" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}"
                       placeholder="Ingrese Número Telefónico" required autofocus autocomplete="telefono">
                       @error('telefono')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
            <!-- Codigo -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-qrcode"></i> Código
                </label>
                <input type="number" id="codio" name="codigo" value="{{ old('codigo', $paciente->codigo) }}"
                       placeholder="Ingrese Código del Paciente" required autofocus autocomplete="codigo">
                       @error('codigo')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- Area_carrera -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-book-bookmark"></i> Carrera o Área
                </label>
                <input type="text" id="carrera_area" name="carrera_area" value="{{ old('carrera_area', $paciente->carrera_area) }}"
                       placeholder="Ingrese Carrera del Paciente" required autofocus autocomplete="carrera_area">
                       @error('carrera_area')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
           
        <!-- Boton principal -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $paciente->exists ? 'Actualizar' : 'Registrar'}}
                </x-primary-button>
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
 