@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/registros.css')}}">    
@endsection

@section('titulo','Registro de extintores')


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
 