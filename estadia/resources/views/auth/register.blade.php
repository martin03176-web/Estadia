@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/log.css')}}">    
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
                    <x-primary-button class="btn btn-solid-red">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                    </x-primary-button>
                    <a class="forgot-link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
            
            <div id="message" class="message"></div>
        </div>
    </section>

        
    
@endsection
@section('scripts')

@endsection