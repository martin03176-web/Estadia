@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Registro de áreas')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Registro de Áreas</h1>
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

        <form method="POST" action="{{ $area->exists ? route('areas.update', $area) : route('areas.store') }}" class="login-form">
            @csrf
            @if ($area->exists) @method('PUT') @endif
             <!-- Edificio -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-arrow-right-to-city"></i> Edifiocio
                </label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="edificio" >
                    <option value="F" @selected(old('edificio', $area->edificio) === 'F' )>F</option>
                    <option value="A" @selected(old('edificio', $area->edificio) === 'A' )>A</option>
                    <option value="F1" @selected(old('edificio', $area->edificio) === 'F1' )>F1</option>
                    <option value="B" @selected(old('edificio', $area->edificio) === 'B' )>B</option>
                    <option value="F2" @selected(old('edificio', $area->edificio) === 'F2' )>F2</option>
                    <option value="C" @selected(old('edificio', $area->edificio) === 'C' )>C</option>
                    <option value="F3" @selected(old('edificio', $area->edificio) === 'F3' )>F3</option>
                    <option value="D" @selected(old('edificio', $area->edificio) === 'D' )>D</option>
                    <option value="F4" @selected(old('edificio', $area->edificio) === 'F4' )>F4</option>
                    <option value="E" @selected(old('edificio', $area->edificio) === 'E' )>E</option>
                    <option value="G" @selected(old('edificio', $area->edificio) === 'G' )>G</option>
                    <option value="H" @selected(old('edificio', $area->edificio) === 'H' )>H</option>
                    <option value="I" @selected(old('edificio', $area->edificio) === 'I' )>I</option>
                    <option value="J" @selected(old('edificio', $area->edificio) === 'J' )>J</option>
                    <option value="Nave" @selected(old('edificio', $area->edificio) === 'Nave' )>Nave</option>
                  </select>
                  @error('sexo')     
                  <div class="logo-text">
                      <p>{{$message}}</p> 
                  </div>
                     @enderror
    
            </div>
            
            <!-- Piso -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-sort"></i> Piso
                </label>
                <input type="text" id="piso" name="piso" value="{{ old('piso', $area->piso) }}"
                       placeholder="Ingrese el Piso" required autofocus autocomplete="piso">
                       @error('piso')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <!-- Lugar -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-magnifying-glass-location"></i> Lugar
                </label>
                <input type="text" id="lugar" name="lugar" value="{{ old('lugar', $area->lugar) }}"
                       placeholder="Ingrese el Lugar" required autofocus autocomplete="lugar">
                       @error('lugar')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-pen-clip"></i> Nota(Opcional)
                </label>
                <input type="text" id="nota" name="nota" value="{{ old('nota', $area->nota) }}"
                       placeholder="Ingrese código del paciente" required autofocus autocomplete="nota">
                       @error('nota')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $area->exists ? 'Actualizar' : 'Registrar'}}
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
 